<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Products;
use App\Mail\SendMail;
use App\Mail\RenewalEmail;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $entries = Entry::all();
        return view('admin.index', compact('entries'));
    }

    public function addNew()
    {
        return view('admin.addnew');
    }

    public function store(Request $request)
    {
        $request->validate([
            //
        ]);

        $products = $request->input('products', []);

        $data = $request->except('products');

        if ($request->hasFile('image')) {
            $fileImages = $request->file('image');
            $imagePaths = [];

            foreach ($fileImages as $fileImage) {
                $fileImageName = rand() . '.' . $fileImage->getClientOriginalName();
                $fileImage->storeAs('public/image/', $fileImageName);
                $imagePaths[] = 'storage/image/' . $fileImageName;
            }
            $data['image'] = json_encode($imagePaths);
        }

        $entry = Entry::create($data);
        $startDate = Carbon::now();

        $totalBalanceSum = 0;
        $balanceAmountSum = 0;

        foreach ($products as $product) {
            if (isset($product['name'])) {

                $validity = $product['validity'];

                switch ($validity) {
                    case '1 Month':
                        $expiryDate = $startDate->addMonth()->format('Y-m-d');
                        ;
                        break;
                    case '3 Months':
                        $expiryDate = $startDate->addMonths(3)->format('Y-m-d');
                        ;
                        break;
                    case '4 Months':
                        $expiryDate = $startDate->addMonths(4)->format('Y-m-d');
                        ;
                        break;
                    case '6 Months':
                        $expiryDate = $startDate->addMonths(6)->format('Y-m-d');
                        ;
                        break;
                    case '12 Months':
                        $expiryDate = $startDate->addYear()->format('Y-m-d');
                        ;
                        break;
                    default:
                        break;
                }

                $totalBalanceSum += (float) $product['total_amount'];
                $balanceAmountSum += (float) $product['balance_amount'];

                Products::create([
                    'product_name' => $product['name'],
                    'total_amount' => $product['total_amount'],
                    'balance_amount' => $product['balance_amount'],
                    'validity' => $validity,
                    'expiry_date' => $expiryDate,
                    'entry_id' => $entry->id,
                ]);
            }
        }


        // dd($balanceAmountSum);
        Mail::to($data['email'])->send(new SendMail($data));
        return redirect('/index')->with('success', 'Add successfully.');
    }

    public function edit($id)
    {
        $entries = Entry::find($id);
        return view('admin.edit', compact('entries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // validation rules
        ]);

        $entry = Entry::findOrFail($id);
        $data = $request->all();

        Mail::to($data['email'])->send(new RenewalEmail($data));
        Mail::to($data['email'])->send(new ConfirmMail($data));

        $entry->update($data);
        return redirect('/index')->with('success', 'Update successfully.');
    }


    // public function sendMail()
    // {
    //     $entry = Entry::first();

    //     Mail::to('helptogethermedia@gmail.com')->send(new SendMail($entry));

    //     return "Email sent successfully!";
    // }


    function delete($id)
    {
        $entry = Entry::find($id);
        $entry->delete();
        return redirect('/index')->with('success', 'Delete successfully.');
    }

    public function filter(Request $request)
    {
        $query = DB::table('entries')
            ->join('products', 'entries.id', '=', 'products.entry_id')
            ->select('entries.*', 'products.*');

        if ($request->has('company')) {
            $query->where('company', 'like', '%' . $request->company . '%');
        }

        if ($request->has('year') && $request->year) {
            $query->whereYear('created_at', $request->year);
        }

        if ($request->has('month') && $request->month) {
            $query->whereMonth('created_at', $request->month);
        }

        if ($request->has('inputState') && !empty($request->inputState)) {
            if ($request->inputState === 'Expired') {
                $query->where('expiry_date', '<', now());
            } elseif ($request->inputState === 'Pending') {
                $query->whereColumn('balance_amount', '<', 'total_amount');

            }
        }
        $entries = $query->get();
        // dd($entries);

        return view('admin.index', compact('entries'));
    }

}


