<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry;

class TestingController extends Controller
{
    public function index(){
        return view('text');
    }

    public function getCompanyData($name)
    {
        $company = Entry::where('company', 'like', '%' . $name . '%')->first();

        return response()->json($company);
    }
}
