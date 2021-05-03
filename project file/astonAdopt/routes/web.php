<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Accounts\RegisterController;
use App\Http\Controllers\Accounts\LoginController;
use App\Http\Controllers\Accounts\LogoutController;
use App\Http\Controllers\Animals\AnimalController;
use App\Http\Controllers\Adoption\AdoptionController;
use App\Http\Controllers\Requests\individualRequestsController;
use App\Http\Controllers\Requests\AllRequestsController;
use App\Http\Controllers\HomeController;


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


Route::get('/', [HomeController::Class, 'index'])->name('home');

Route::get('/register', [RegisterController::Class, 'index'])->name('register');
Route::post('/register', [RegisterController::Class, 'store']);

Route::get('/login', [LoginController::Class, 'index'])->name('login');
Route::post('/login', [LoginController::Class, 'store']);

Route::post('/logout', [LogoutController::Class, 'store'])->name('logout');

Route::get('/addAnimal', [AnimalController::Class, 'index'])->name('animal');
Route::post('/addAnimal', [AnimalController::Class, 'store']);
Route::get('/animalDetails/{id}', [AnimalController::Class, 'details'])->name('animal.details');

Route::get('/adoption', [AdoptionController::Class, 'index'])->name('adoption');
Route::get('/adoptionDetails/{id}', [AdoptionController::Class, 'details'])->name('adoption.details');
Route::post('/adoptionDetails/{animal}', [AdoptionController::Class, 'request'])->name('adoption.request');

Route::get('/individualRequests', [IndividualRequestsController::Class, 'index'])->name('individualRequests');
Route::get('/individualRequestsDetails/{id}', [IndividualRequestsController::Class, 'details'])->name('individualRequests.details');
Route::delete('/individualRequestsDetails/{id}', [IndividualRequestsController::Class, 'destroy'])->name('individualRequests.details');

Route::get('/allRequests', [AllRequestsController::Class, 'index'])->name('allRequests');
Route::get('/allRequestsDetailsP/{id}/{uid}', [AllRequestsController::Class, 'detailsP'])->name('allRequests.detailsP');
Route::post('/allRequestsDetailsP/{id}/{uid}', [AllRequestsController::Class, 'confirmation']);
Route::get('/allRequestsDetailsC/{id}/{uid}', [AllRequestsController::Class, 'detailsC'])->name('allRequests.detailsC');
Route::delete('/allRequestsDetailsC/{id}/{uid}', [AllRequestsController::Class, 'cancellation'])->name('allRequests.detailsC');
