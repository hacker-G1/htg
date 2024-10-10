if ($request->has('year') && $request->year) {
    $query->whereYear('created_at', $request->year);
}

if ($request->has('month') && $request->month) {
    $query->whereMonth('created_at', $request->month);
}


{{--  Kernal.php--}}
namespace App\Console;

use App\Mail\ReminderEmail; // Assuming you have this mailable class
use App\Models\YourModel;   // Replace with the model you are using
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Schedule the command to run daily
        $schedule->call(function () {
            $twoMonthsAgo = Carbon::now()->subMonths(2);

            // Get records that were created exactly two months ago
            $clients = YourModel::whereDate('created_at', $twoMonthsAgo->toDateString())->get();

            foreach ($clients as $client) {
                Mail::to($client->email)->send(new ReminderEmail($client));
            }
        })->daily(); // You can choose other intervals as needed
    }
}

{{-- reminder mail --}}
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function build()
    {
        return $this->view('emails.reminder')
                    ->with([
                        'clientName' => $this->client->name, // Assuming 'name' is a field
                        'createdDate' => $this->client->created_at,
                    ]);
    }
}

{{-- reminder.blade --}}
<!DOCTYPE html>
<html>
<head>
    <title>Reminder Email</title>
</head>
<body>
    <h1>Hello, {{ $clientName }}</h1>
    <p>This is a reminder email for your registration, which was created on {{ $createdDate }}.</p>
    <p>Thank you!</p>
</body>
</html>

{{-- php artisan queue:table
php artisan migrate
 --}}

{{-- Mail --}}
public function build()
{
    return $this->view('emails.reminder')
                ->with([
                    'clientName' => $this->client->name,
                    'createdDate' => $this->client->created_at,
                ])
                ->onQueue('emails');
}
{{-- php artisan queue:work
 --}}

