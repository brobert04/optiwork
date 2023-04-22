<?php

use App\Http\Controllers\CustomAuth\CustomRegistration;
use App\Http\Controllers\CustomAuth\EmployeeRegister;
use App\Http\Controllers\CustomAuth\EmployerRegister;
use App\Http\Controllers\CustomAuth\ProviderRegistration;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\employer\EmployerCompany;
use App\Http\Controllers\employer\EmployerProfile;
use App\Http\Controllers\employer\ManageEmployees;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employer\SendInviteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('jobhive.frontend.index');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::post('/register', [CustomRegistration::class, 'create'])->name('custom.register');
Route::get('/auth/google/redirect' , [CustomRegistration::class, 'googleAuthRedirect'])->name('auth.redirect');
Route::get('/auth/google/callback', [CustomRegistration::class, 'googleAuth'])->name('auth.callback');


Route::group(['prefix' => 'employer', 'middleware' => ['auth', 'verified', 'isEmployer']], function(){
    Route::resource('employees', ManageEmployees::class);
   Route::resource('departments', \App\Http\Controllers\employer\ManageDepartments::class)->except(['create', 'show']);
   Route::get('/furlough-requests', [\App\Http\Controllers\employer\ManageFurloughsRequests::class, 'index'])->name('employer.furlough.index');
    Route::post('/furlough-requests/accept/{id}', [\App\Http\Controllers\employer\ManageFurloughsRequests::class, 'accept'])->name('employer.furlough.accept');
    Route::post('/furlough-requests/deny/{id}', [\App\Http\Controllers\employer\ManageFurloughsRequests::class, 'deny'])->name('employer.furlough.deny');

    Route::get('/document-management', [\App\Http\Controllers\employer\DocumentsManagementController::class, 'index'])->name('employer.documents.index');
    Route::post('/document-management', [\App\Http\Controllers\employer\DocumentsManagementController::class, 'addDocuments'])->name('employer.documents.add');

});

Route::group(['prefix' => 'employee', 'middleware' => ['auth', 'verified', 'isEmployee']], function(){
        Route::get('/furlogh-request', [\App\Http\Controllers\employee\FurloughController::class, 'index'])->name('employee.furlough.index');
        Route::post('/furlogh-request', [\App\Http\Controllers\employee\FurloughController::class, 'create'])->name('employee.furlough.create');

    Route::post('/raspund', [\App\Http\Controllers\employee\BotController::class, 'postRaspund'])->name('employer.chat.post');

});


require __DIR__.'/auth.php';
