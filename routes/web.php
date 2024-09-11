<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BillingMethodController;
use App\Http\Controllers\PackageChooseController;
use App\Http\Controllers\Roles;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SettingsController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(DashboardController::class)->group(function () {
    // Route::get('/index', 'index');
    // Route::post('/store', 'store');
    // Route::get('/show/{id}', 'show');
    // Route::put('/update/{id}', 'update');
    // Route::delete('/delete/{id}', 'destroy');
});


Route::controller(SchoolController::class)->group(function () {
    Route::get('/school', 'index')->name('school.index');
});
Route::controller(ApartmentController::class)->group(function () {
    Route::get('/apartment', 'index')->name('apartment.index');
});
Route::controller(StudentController::class)->group(function () {
    Route::get('/student', 'index')->name('student.index');
});
Route::controller(BillingMethodController::class)->group(function () {
    Route::get('/billing/methods', 'index')->name('billing_methods.index');
});
Route::controller(PackageChooseController::class)->group(function () {
    Route::get('/package', 'index')->name('package.index');
});
Route::controller(Roles::class)->group(function () {
    Route::get('/roles', 'index')->name('role.index');
});
Route::controller(BillingController::class)->group(function () {
    Route::get('/billing', 'index')->name('billings.index');
    Route::get('/billing/{status}', 'index')->name('billings.status');
});
Route::controller(SignatureController::class)->group(function () {
    Route::get('/signature', 'index')->name('signature.index');
});
Route::controller(InvoiceController::class)->group(function () {
    Route::get('/Invoice', 'index')->name('invoice.index');
});
Route::controller(UsersController::class)->group(function () {
    Route::get('/Users', 'index')->name('users.index');
});
Route::controller(SettingsController::class)->group(function () {
    Route::get('/settings', 'index')->name('settings.index');
});







require __DIR__ . '/auth.php';
