<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatusController;


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

Route::get('/list', [StatusController::class, 'ProjectList'])->name('ProjectList');
Route::get('/create', [StatusController::class, 'CreateProject'])->name('CreateProject');
Route::post('/newproject', [StatusController::class, 'NewProject'])->name('new.project');
Route::get('/addnewresource/{project_key}', [StatusController::class, 'AddResourceView']);
Route::post('/addresource', [StatusController::class, 'AddResource'])->name('add.resource');
Route::get('/viewresource/{project_key}', [StatusController::class, 'ViewResource']);

Auth::routes();



/*------------------------------------------

--------------------------------------------

All Normal Users Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:user'])->group(function () {



    Route::get('/home', [HomeController::class, 'index'])->name('home');

});



/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:admin'])->group(function () {



    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

});



/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:manager'])->group(function () {



    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');

});

