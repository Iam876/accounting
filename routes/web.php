<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\PIC_Controller;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BillingMethodController;
use App\Http\Controllers\PackageChooseController;
use App\Http\Controllers\Roles;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\messageController;
use App\Helpers\CountryHelper;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth', 'role.check'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/get-countries', function () {
        $countries = CountryHelper::getCountries();
        return response()->json(['countries' => $countries]);

    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');


    // ###### Start language Routes ########

    Route::get('lang/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'ja'])) {
            session(['locale' => $locale]);
        }
        return redirect()->back();
    })->name('changeLanguage');


    // ###### End language Routes ########




    Route::controller(DashboardController::class)->group(function () {
        // Route::get('/index', 'index');
        // Route::post('/store', 'store');
        // Route::get('/show/{id}', 'show');
        // Route::put('/update/{id}', 'update');
        // Route::delete('/delete/{id}', 'destroy');
    });


    Route::controller(SchoolController::class)->group(function () {
        Route::get('/school', 'index')->name('school.index');
        Route::get('/schools/fetch', 'fetchData')->name('school.fetch');
        Route::post('/schools/store', 'store')->name('schools.store');
        Route::get('/schools/edit/{id}', 'edit')->name('schools.edit');
        Route::post('/schools/update/{id}', 'update')->name('schools.update');
        Route::delete('/schools/destroy/{id}', 'destroy')->name('schools.destroy');
    });


    Route::controller(PIC_Controller::class)->group(function () {
        Route::get('/pic/index', 'index')->name('pic.index');
        Route::get('/pic/fetch', 'fetchData')->name('pic.fetch');
        Route::post('/pic/store', 'store')->name('pic.store');
        Route::get('/pic/edit/{id}', 'edit')->name('pic.edit');
        Route::post('/pic/update/{id}', 'update')->name('pic.update');
        Route::delete('/pic/destroy/{id}', 'destroy')->name('pic.destroy');
    });



    Route::controller(ApartmentController::class)->group(function () {
        Route::get('/apartment', 'index')->name('apartment.index');
        Route::get('/apartment/fetch', 'fetchData')->name('apartment.fetch');
        Route::get('/pic/names', 'fetchPicNames')->name('pic.names');
        Route::post('/apartment/store', 'store')->name('apartment.store');
        Route::get('/apartment/edit/{id}', 'edit');
        Route::post('/apartment/update/{id}', 'update');
        Route::get('/path-to-fetch-pic-options', 'getAllPics');
        Route::delete('/apartment/destroy/{id}', 'destroy')->name('apartment.destroy');

        Route::get('/apartments/{id}/rooms', [ApartmentController::class, 'getRoomsByApartment']);

    });

    Route::controller(RoomController::class)->group(function () {
        Route::get('/rooms', 'index')->name('room.index');
    });


    Route::controller(StudentController::class)->group(function () {

        Route::get('/get-schools', 'getSchools');
        Route::get('/get-apartments', 'getApartments');
        Route::get('/get-rooms/{apartment_id}', 'getRooms');
        Route::get('/get-packages', 'getPackages');


        Route::get('/student', 'index')->name('student.index');
        Route::post('/student/store', 'store')->name('student.store');
        Route::get('/student/fetch', 'fetchData')->name('student.fetch');

        Route::get('/students/edit/{id}', 'edit');
        Route::post('/students/update/{id}', 'update');
        Route::delete('/student/destroy/{id}', 'destroy')->name('student.destroy');

        // Student Contract Excel File Export Route
        Route::get('/export-student/{id}', 'exportStudentContract')->name('export.student');

    });
    Route::controller(BillingMethodController::class)->group(function () {
        Route::get('/billing/methods', 'index')->name('billing_methods.index');
        Route::get('/fetch/billing/method', 'fetchBillingMethod');
        Route::post('/billing/method/create', 'store');
        Route::get('/billing/method/edit/{id}', 'edit');
        Route::post('/billing/method/update/{id}', 'update');
        Route::delete('/billing/method/destroy/{id}', 'destroy');
    });
    Route::controller(PackageChooseController::class)->group(function () {
        Route::get('/package', 'index')->name('package.index');
        Route::get('/package/fetch', 'fetchData')->name('package.fetch');

        Route::post('/package/store', 'store')->name('package.store');
        Route::get('/package/edit/{id}', 'edit')->name('package.edit');
        Route::post('/package/update/{id}', 'update')->name('package.update');
        Route::delete('/package/destroy/{id}', 'destroy')->name('package.destroy');
    });
    Route::controller(Roles::class)->group(function () {
        Route::get('/roles', 'index')->name('role.index');
        Route::get('/fetch/roles', 'fetchRole');
        Route::post('/roles/create', 'store');
        Route::get('/roles/edit/{id}', 'edit');
        Route::post('/roles/update/{id}', 'update');
        Route::delete('/roles/destroy/{id}', 'destroy');
    });

    Route::controller(BillingController::class)->group(function () {

        Route::get('/billing', 'index')->name('billings.index');
        Route::get('/billing/status/{status}', 'index')->name('billings.status');
        Route::get('/billings/fetch/{status?}', 'fetchData')->name('billing.fetch'); // Optional status parameter
        Route::post('/billings/update/{billing}', 'updateBilling');
        Route::get('/billings/{billingId}', 'fetchBillingById');
        Route::get('fetch-unpaid/{studentId}', 'fetchUnpaidMonths');
        Route::post('update-multiple-dues/{studentId}', 'updateMultipleDues');
        Route::post('close-account/{studentId}', 'closeAccount');

        Route::get('/billings/history/{studentId}', 'fetchBillingHistory');

        Route::get('/student/billings/index', 'studentAllBillings');
        Route::get('/student/all/billings', 'getStudentBillingData');



    });

    Route::post('/billings/{billingId}/payment', [PaymentController::class, 'recordPayment']);
    Route::post('/payments/store', [PaymentController::class, 'store']);




    Route::controller(SignatureController::class)->group(function () {
        Route::get('/signature', 'index')->name('signature.index');
    });
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/Invoice', 'index')->name('invoice.index');
    });
    Route::controller(UsersController::class)->group(function () {
        Route::get('/Users', 'index')->name('users.index');
        Route::get('/fetch/users', 'fetchUsers')->name('users.fetch');
        Route::get('/fetch/roles', 'fetchRoles')->name('roles.fetch');
        Route::post('/users/store', 'store')->name('users.store');
        Route::get('/users/edit/{id}', 'edit')->name('users.edit');
        Route::post('/users/update/{id}', 'update')->name('users.update');
        Route::delete('/users/destroy/{id}', 'destroy')->name('users.destroy');
    });
    Route::controller(SettingsController::class)->group(function () {
        Route::get('/settings', 'index')->name('settings.index');
    });
    Route::controller(messageController::class)->group(function () {
        Route::get('/messages', 'index')->name('messages.index');
        Route::get('/messages/fetch/{receiver_id}', 'fetchMessages')->name('messages.fetch');
        Route::post('/messages/send', 'sendMessage')->name('messages.send');

        Route::post('/messages/typing',  'typing');
        Route::get('/messages/check-typing/{receiver_id}',  'checkTyping');

    });


});




require __DIR__ . '/auth.php';
