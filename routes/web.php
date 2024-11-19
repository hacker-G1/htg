<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

// Login
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SMSController;
use App\Http\Controllers\TestingController;

Route::get('/paginate', function () {
    return view('vendor.pagination.default');
});

// Route::get('/mail', function () {
//     Mail::to('helptogethermedia@gmail.com')
//         ->send(new SendMail());
//     // return view('welcome');
// });

//LoginPage===========--------------===========>>>>
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/admin', [LoginController::class, 'loginPost'])->name('login.post');
Route::get('admin/logout', [LoginController::class, 'logout'])->name('adminLogout');

//Authentication
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('index');
    Route::get('/index', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/addnew', [DashboardController::class, 'addNew'])->name('addnew');
    Route::get('/renew', [DashboardController::class, 'renew'])->name('renew');
    Route::post('/addnew', [DashboardController::class, 'store'])->name('addnew.store');
    Route::get('/entry/{id}/edit', [DashboardController::class, 'edit'])->name('entry.edit');
    Route::patch('/entry/{id}', [DashboardController::class, 'update'])->name('entry.update');
    Route::get('/entry/delete/{id}', [DashboardController::class, 'delete'])->name('entry.delete');
    Route::get('/sendMail', [DashboardController::class, 'sendMail']);
    Route::get('/search-filter', [DashboardController::class, 'filter'])->name('search.filter');
    Route::get('/get-company-data/{name}', [DashboardController::class, 'getCompanyData'])->name('company.data');

    Route::get('/historyPage', [DashboardController::class, 'index'])->name('historyPage');

    // SMS
    Route::post('/send-sms', [SMSController::class, 'sendSms']);
    Route::get('/download-multiple/{id}', [DashboardController::class, 'downloadImages'])->name('download');
    Route::get('/export-contracts', [DashboardController::class, 'export'])->name('export.contracts');

});
