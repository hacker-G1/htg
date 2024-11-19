<?php

namespace App\Exports;

use App\Models\Entry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $status;

    // Constructor to accept filters
    public function __construct($status = null)
    {
        $this->status = $status;
    }
    public function collection()
    {
        $query = Entry::with('product');

        if (!empty($this->status)) {
            if ($this->status === 'Expired') {
                $query->whereHas('product', function ($query) {
                    $query->where('expiry_date', '<', now());
                });
            } elseif ($this->status === 'Pending') {
                $query->whereHas('product', function ($query) {
                    $query->whereRaw('total_amount - paid_amount > 0');
                });
            }
            // dd($this->status);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return ['ID', 'Company Name', 'Type', 'Email', 'Contact Number', 'Total Amount', 'Balance Payment', 'GST', 'Address', 'Date'];
    }

    public function map($entry): array
    {
        $totalAmount = $entry->product ? $entry->product->sum('total_amount') : 0;
        $balancePayment = $totalAmount - ($entry->product ? $entry->product->sum('paid_amount') : 0);

        return [
            $entry->id,
            $entry->company,
            $entry->type,
            $entry->email,
            $entry->contactno,
            $totalAmount,
            $balancePayment,
            $entry->gst,
            $entry->address,
            $entry->created_at->format('Y-m-d'),
        ];
    }
}
