<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\FerryController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserBenefitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Schools api
Route::post('/schools', [SchoolController::class,'addSchool']);
Route::post('/updateSchool', [SchoolController::class,'updateSchool']);
Route::get('/schools', [SchoolController::class,'getSchools']);
Route::get('/schools/inspectors/{county_id}', [SchoolController::class,'getSchoolsForInspectors']);
Route::get('/schools/residents/{user_id}', [SchoolController::class,'getSchoolsForResidents']);
Route::get('/schools/{id}', [SchoolController::class,'getSchoolById']);
Route::get('/schools/delete/{id}', [SchoolController::class,'deleteSchoolById']);
Route::get('/schoolsReport', [SchoolController::class,'getSchoolReport']);
Route::get('/schoolsReportInspectors/{county_id}', [SchoolController::class,'getSchoolReportForInspectors']);
Route::get('/schools/report/residents/{id}', [SchoolController::class,'getSchoolReportForResidents']);

// Clinics api
Route::post('/clinics', [ClinicController::class,'addClinic']);
Route::post('/updateClinic', [ClinicController::class,'updateClinic']);
Route::get('/clinics', [ClinicController::class,'getClinics']);
Route::get('/clinics/inspectors/{county_id}', [ClinicController::class,'getClinicsForInspectors']);
Route::get('/clinics/residents/{user_id}', [ClinicController::class,'getClinicsForResidents']);
Route::get('/clinics/{id}', [ClinicController::class,'getClinicById']);
Route::get('/clinics/delete/{id}', [ClinicController::class,'deleteSchoolById']);
Route::get('/clinicsReport', [ClinicController::class,'getClinicReport']);
Route::get('/clinics/report/residents/{id}', [ClinicController::class,'getClinicReportForResidents']);

// Businesses api
Route::post('/businesses', [BusinessController::class,'addBusiness']);
Route::post('/updateBusiness', [BusinessController::class,'updateBusiness']);
Route::get('/businesses', [BusinessController::class,'getBusinesses']);
Route::get('/businesses/inspectors/{county_id}', [BusinessController::class,'getBusinessesForInspectors']);
Route::get('/businesses/residents/{user_id}', [BusinessController::class,'getBusinessesForResidents']);
Route::get('/businesses/{id}', [BusinessController::class,'getBusinessById']);
Route::get('/businesses/delete/{id}', [BusinessController::class,'deleteSchoolById']);
Route::get('/businessesReport', [BusinessController::class,'getBusinessReport']);
Route::get('/businesses/report/residents/{id}', [BusinessController::class,'getBusinessReportForResidents']);

// Flights api
Route::post('/flights', [FlightController::class,'addFlight']);
Route::post('/updateFlight', [FlightController::class,'updateFlight']);
Route::get('/flights', [FlightController::class,'getFlights']);
Route::get('/flights/inspectors/{county_id}', [FlightController::class,'getFlightsForInspectors']);
Route::get('/flights/residents/{user_id}', [FlightController::class,'getFlightsForResidents']);
Route::get('/flights/{id}', [FlightController::class,'getFlightById']);
Route::get('/flights/delete/{id}', [FlightController::class,'deleteSchoolById']);
Route::get('/flightsReport', [FlightController::class,'getFlightReport']);
Route::get('/flights/report/residents/{id}', [FlightController::class,'getFlightReportForResidents']);

// Ferry api
Route::post('/ferry', [FerryController::class,'addFerry']);
Route::post('/updateFerry', [FerryController::class,'updateFerry']);
Route::get('/ferry', [FerryController::class,'getFerry']);
Route::get('/ferry/inspectors/{county_id}', [FerryController::class,'getFerryForInspectors']);
Route::get('/ferry/residents/{user_id}', [FerryController::class,'getFerryForResidents']);
Route::get('/ferry/{id}', [FerryController::class,'getFerryById']);
Route::get('/ferry/delete/{id}', [FerryController::class,'deleteSchoolById']);
Route::get('/ferryReport', [FerryController::class,'getFerryReport']);
Route::get('/ferry/report/residents/{id}', [FerryController::class,'getFerryReportForResidents']);

// Events api
Route::post('/events', [EventController::class,'addEvent']);
Route::post('/updateEvent', [EventController::class,'updateEvent']);
Route::get('/events', [EventController::class,'getEvents']);
Route::get('/events/inspectors/{county_id}', [EventController::class,'getEventsForInspectors']);
Route::get('/events/residents/{user_id}', [EventController::class,'getEventsForResidents']);
Route::get('/events/{id}', [EventController::class,'getEventById']);
Route::get('/events/delete/{id}', [EventController::class,'deleteEventById']);
Route::get('/eventsReport', [EventController::class,'getEventReport']);
Route::get('/events/report/residents/{id}', [EventController::class,'getEventReportForResidents']);

// Users api
Route::post('/users', [UserController::class,'addUser']);
Route::get('/users', [UserController::class,'getUsers']);
Route::get('/users/inspectors/{county_id}', [UserController::class,'getUsersForInspectors']);
Route::get('/users/residents/{user_id}', [UserController::class,'getUsersForResidents']);
Route::get('/users/{id}', [UserController::class,'getUserById']);
Route::get('/residents', [UserController::class,'getResidents']);



// County api
Route::post('/counties', [CountyController::class,'addCounty']);
Route::post('/updateCounty', [CountyController::class,'updateCounty']);
Route::get('/counties', [CountyController::class,'getCounties']);
Route::get('/counties/inspectors/{county_id}', [CountyController::class,'getCountiesForInspectors']);
Route::get('/counties/residents/{user_id}', [CountyController::class,'getCountiesForResidents']);
Route::get('/counties/{id}', [CountyController::class,'getCountyById']);
Route::get('/counties/delete/{id}', [CountyController::class,'deleteCountyById']);


Route::get('/login/{email}/{password}', [LoginController::class,'login']);

Route::post('/userBenefits', [UserBenefitController::class,'registerBenefit']);
Route::get('/userBenefits/count/{benefit_type}', [UserBenefitController::class,'getUserbenefitsByCount']);
Route::get('/userBenefits/count/{benefit_type}/{county_id}', [UserBenefitController::class,'getUserbenefitsByCountForInspectors']);