<?php

namespace App\Console\Commands;

use App\Models\Entry;
use Illuminate\Console\Command;
use App\Mail\ExpirationReminderMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Products;
use Carbon\Carbon;

class SendExpirationReminders extends Command
{
    protected $signature = 'send:expiry';
    protected $description = 'Send emails to clients 15 days before expiry date';

    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $tenDaysFromNow = Carbon::now()->addDays(10);
        // $tenDaysFromNow = Carbon::now()->format('Y-m-d');

        // $clients = Products::where('expiry_date', '<=', $tenDaysFromNow)
        //     ->get();
        $clients = Entry::where('expiry_date', '<=', $tenDaysFromNow)
            ->get();

        foreach ($clients as $client) {
            Mail::to($client->entry->email)->send(new ExpirationReminderMail($client));

            $client->is_notified = true;
            $client->save();
        }

        $this->info('Expiration reminders sent successfully.');
    }
    // public function handle()
    // {
    //     $currentDate = Carbon::now();

    //     $expiryDate = $currentDate->addDays(30);


    //     $clients = Products::whereDate('expiry_date', $expiryDate)->get();

    //     foreach ($clients as $client) {
    //         Mail::to($client->entry->email)->send(new ExpirationReminderMail($client));
    //     }

    //     $this->info('Expiry notifications sent successfully!');
    // }

}
