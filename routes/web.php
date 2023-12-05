<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Consulting_RoomController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EspecialityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Appointment;
use App\Models\Consulting_room;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});


Route::middleware('auth')->group(function () {
    
    //Home
    Route::get('/home', [HomeController::class, 'requests'])->name('home.requests');
    Route::get('/home/appointments/create', [HomeController::class, 'requestsCreate'])->name('home.requestsCreate');
    Route::post('/home/appointments/store', [HomeController::class, 'requestStore'])->name('home.requestStore');
    Route::get('/home/appointments/{appointment}', [HomeController::class, 'requestShow'])->name('home.requestShow');
    Route::get('/home/appointmentsHistory/', [HomeController::class, 'requestHistory'])->name('home.requestHistory');

    Route::get('/getHour/{date}', [HomeController::class, 'getHour'])->name('getHour');
    
    Route::get('/home/patients', [HomeController::class, 'patients'])->name('home.patients');
    Route::get('/home/patients/create', [HomeController::class, 'patientsCreate'])->name('home.patientscreate');
    Route::post('/home/patients', [HomeController::class, 'patientsStore'])->name('home.patientsStore');
    Route::middleware('authenticationPatient')->get('/home/patients/{patient}', [HomeController::class, 'patientsShow'])->name('home.patientsShow');
    Route::put('/home/patients/update/{patient}', [HomeController::class, 'patientsUpdate'])->name('home.patientsUpdate');
    Route::delete('/home/patients/{patient}', [HomeController::class, 'patientDestroy'])->name('home.patientDestroy');

    //Request Admin
    Route::get('/admin/appointment/confirmed', [AppointmentController::class, 'appointmentConfirmed']) -> name('appointmentConfirmed');
    Route::resource('admin/appointment', AppointmentController::class);
    //Patients Admin
    Route::resource('admin/patient', PatientController::class);
    //Doctor Admin
    Route::resource('admin/doctor', DoctorController::class);
    //Especiality Admin
    Route::resource('admin/especiality', EspecialityController::class);
    //Consultories
    Route::resource('admin/consulting-room', Consulting_RoomController::class);
    //Users
    Route::resource('admin/user', UserController::class);
    //
    Route::put('/admin/appointment/status/{appointment}', [AppointmentController::class, 'statusChange'])->name('appointment.statusChange');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

require __DIR__.'/auth.php';
