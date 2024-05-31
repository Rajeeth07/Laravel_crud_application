<?php

use App\Http\Controllers\Auth\logController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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


Route::get('/home',[EmployeeController::class,'index'])->middleware('auth')->name('welcome');
Route::get('/home/create',[EmployeeController::class,'create'])->middleware('auth')->name('employee.create');
Route::post('/home/store',[EmployeeController::class,'store'])->middleware('auth')->name('employee.store');
Route::get('/home/{employee}',[EmployeeController::class,'show'])->middleware('auth')->name('employee.show');
Route::get('/home/{employee}/edit',[EmployeeController::class,'edit'])->middleware('auth')->name('employee.edit');
Route::put('/home/{employee}',[EmployeeController::class,'update'])->middleware('auth')->name('employee.update');
Route::delete('home/{employee}',[EmployeeController::class,'destroy'])->middleware('auth')->name('employee.destroy');
Route::get('/{employee}/delete',[EmployeeController::class,'delete'])->middleware('auth')->name('employee.delete');

Route::get('login', function(){
    return view('auth.login');
})->middleware('guest')->name('login');
Route::post('authenticate',[logController::class,'authenticate']);
Route::view('register','auth.register')->middleware('guest');
Route::post('store',[RegisterController::class,'store']);
Route::get('logout',[logController::class,'logout']);

