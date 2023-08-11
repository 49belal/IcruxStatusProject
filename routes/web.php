<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SuperAdminController;


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



Route::get('/a', function () {

    return view('welcome');

});


//Admin Routes
Route::get('/list', [StatusController::class, 'ProjectList'])->name('ProjectList');
Route::get('/create', [StatusController::class, 'CreateProject'])->name('CreateProject');
Route::post('/newproject', [StatusController::class, 'NewProject'])->name('new.project');
Route::get('/addnewresource/{project_key}', [StatusController::class, 'AddResourceView']);
Route::post('/addresource', [StatusController::class, 'AddResource'])->name('add.resource');
Route::get('/viewresource/{project_key}', [StatusController::class, 'ViewResource']);

//User Routes
Route::get('/resourcedetails', [ResourceController::class, 'resourcedetails'])->name('resourcedetails');


//Super Admin Routes
Route::get('/registeruser', [SuperAdminController::class, 'registeruser'])->name('register.user');



//Middleware
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



// Route::get('/', '\RootInc\LaravelAzureMiddleware\Azure@azure');

// // Route::get('/login/azure', '\RootInc\LaravelAzureMiddleware\Azure@azure')
// //     ->name('azure.login');





Route::get('/', [\App\Http\Middleware\AppAzure::class,'azure']);

Route::get('/login/azurecallback', [\App\Http\Middleware\AppAzure::class,'azurecallback'])

    ->name('azure.callback');

Route::get('/logout/azure', '\App\Http\Middleware\AppAzure@azurelogout')
    ->name('azure.logout');

Route::get("/login123", [StatusController::class, 'Login123']);
