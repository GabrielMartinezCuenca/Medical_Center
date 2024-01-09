<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Consulting_RoomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EspecialityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Appointment;
use App\Models\Consulting_room;
use App\Models\Prescription;
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
    Route::get('/home', [HomeController::class, 'requests'])->middleware('can:home.requests')->name('home.requests');
    Route::get('/home/appointments/create', [HomeController::class, 'requestsCreate'])->middleware('can:home.requestsCreate')->name('home.requestsCreate');
    Route::post('/home/appointments/store', [HomeController::class, 'requestStore'])->middleware('can:home.requestsCreate')->name('home.requestStore');
    Route::get('/home/appointments/{appointment}', [HomeController::class, 'requestShow'])->middleware('can:home.requestShow')->name('home.requestShow');
    Route::get('/home/appointmentsHistory/', [HomeController::class, 'requestHistory'])->middleware('can:home.requestHistory')->name('home.requestHistory');

    Route::get('/getHour/{date}', [HomeController::class, 'getHour'])->name('getHour');

    Route::get('/home/patients', [HomeController::class, 'patients'])->middleware('can:home.patients')->name('home.patients');
    Route::get('/home/patients/create', [HomeController::class, 'patientsCreate'])->middleware('can:home.patientscreate')->name('home.patientscreate');
    Route::post('/home/patients', [HomeController::class, 'patientsStore'])->middleware('can:home.patientscreate')->name('home.patientsStore');
    Route::middleware('authenticationPatient')->get('/home/patients/{patient}', [HomeController::class, 'patientsShow'])->middleware('can:home.patientsShow')->name('home.patientsShow');
    Route::put('/home/patients/update/{patient}', [HomeController::class, 'patientsUpdate'])->middleware('can:home.patientsShow')->name('home.patientsUpdate');
    Route::delete('/home/patients/{patient}', [HomeController::class, 'patientDestroy'])->middleware('can:home.patientDestroy')->name('home.patientDestroy');

    //Request Admin
    Route::get('/admin')->middleware('can:admin')->name('admin.home');
    Route::get('/admin/appointment/confirmed', [AppointmentController::class, 'appointmentConfirmed'])->middleware('can:appointmentConfirmed')->name('appointmentConfirmed');
    Route::get('/admin/prescription/{appointment}', [AppointmentController::class, 'prescription'])->middleware('can:appointment.prescription')->name('appointment.prescription');
    Route::resource('admin/appointment', AppointmentController::class)->except('edit', 'update');
    Route::put('/admin/appointment/status/{appointment}', [AppointmentController::class, 'statusChange'])->middleware('can:appointment.statusChange')->name('appointment.statusChange');
    Route::put('/admin/appointment/cancel/{appointment}', [AppointmentController::class, 'cancelAppointment'])->middleware('can:appointment.cancelAppointment')->name('appointment.cancelAppointment');
    Route::get('/admin/history', [AppointmentController::class, 'history'])->middleware('can:appointment.history')->name('appointment.history');
    Route::get('/admin/canceled', [AppointmentController::class, 'canceled'])->middleware('can:appointment.canceled')->name('appointment.canceled');

    //Route::get('/admin/appointment/prescription/view/{}', [AppointmentController::class, 'prescriptionView'])->name('appointment.prescriptionView');
    //Patients Admin
    Route::resource('admin/patient', PatientController::class)->except('show');
    Route::post('admin/patient/patientCreateAppointment', [PatientController::class, 'patientCreateAppointment'])->middleware('patient.patientCreateAppointment')->name('patient.patientCreateAppointment');
    //Doctor Admin
    Route::resource('admin/doctor', DoctorController::class)->except('show');
    //Especiality Admin
    Route::resource('admin/especiality', EspecialityController::class)->except('show');
    //Consultories
    Route::resource('admin/consulting-room', Consulting_RoomController::class)->except('show');
    //Users
    Route::resource('admin/user', UserController::class);
    //
    Route::post('admin/prescription/store/{id}', [PrescriptionController::class, 'store'])->middleware('can:prescription.store')->name('prescription.store');
    Route::get('admin/prescription/view/{appointment}', [PrescriptionController::class, 'prescriptionPanel'])->middleware('can:prescription.view')->name('prescription.view');


    Route::put('/admin/patient/information/{appointment}', [PatientController::class, 'changeInformation'])->middleware('can:patient.changeInformation')->name('patient.changeInformation');
    Route::put('/admin/patient/informationP/{appointment}', [PatientController::class, 'changeInformationP'])->middleware('can:patient.changeInformationP')->name('patient.changeInformationP');
    Route::get('/profile', [ProfileController::class, 'edit'])->middleware('can:profile.edit')->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->middleware('can:profile.update')->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware('can:profile.destroy')->name('profile.destroy');
    Route::get('/admin', [AdminController::class, 'index'])->middleware('can:admin')->name('admin.index');

    Route::get('/pdfgenerate/{appointment}', [PDFController::class, 'pdfGenerate'])->middleware('can:pdfGenerate')->name('pdfGenerate');

    //ROles
    Route::resource('/admin/role', RoleController::class);
    Route::resource('/admin/dashboard', DashboardController::class)->only('index');

    Route::get('admin/dashboard/prescriptionPanel/{prescription}', [DashboardController::class, 'prescriptionPanel'])->middleware('can:prescription.store')->name('dashboard.prescriptionPanel');
    Route::get('admin/dashboard/prescription/{prescription}', [DashboardController::class, 'prescription'])->middleware('can:prescription.store')->name('dashboard.prescription');
    Route::post('admin/dashboard/prescriptionStore/{prescription}', [DashboardController::class, 'prescriptionStore'])->middleware('can:prescription.store')->name('dashboard.prescriptionStore');


});



Route::middleware('generatePassword')->get('/doctor/create/password/{token}', [UserController::class, 'generatePassword'])->name('user.generatePassword');
Route::put('/doctor/create/password/generate/{token}', [UserController::class, 'changePassword'])->name('user.changePassword');

require __DIR__ . '/auth.php';
