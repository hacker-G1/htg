<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TextGuruService;

class SMSController extends Controller
{
    protected $textGuru;

    public function __construct(TextGuruService $textGuru)
    {
        $this->textGuru = $textGuru;
    }

    public function sendSms(Request $request)
    {
        $mobileNumber = $request->input('mobile');
        $message = $request->input('message');

        $response = $this->textGuru->sendSms($mobileNumber, $message);

        if (isset($response['error'])) {
            return response()->json(['message' => 'SMS failed: ' . $response['error']], 500);
        }

        return response()->json(['message' => 'SMS sent successfully']);
    }
}
