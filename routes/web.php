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

    return view('dashboard');

});


//Admin Routes
Route::get('/list', [StatusController::class, 'ProjectList'])->name('ProjectList');
Route::get('/create', [StatusController::class, 'CreateProject'])->name('CreateProject');
Route::post('/newproject', [StatusController::class, 'NewProject'])->name('new.project');
Route::get('/editproject/{project_key}', [StatusController::class, 'editproject'])->name('editproject');
Route::post('/updateproject', [StatusController::class, 'UpdateProject'])->name('updateproject');
Route::get('/ProjectStatus/{flag}', [StatusController::class, 'ProjectStatus'])->name('ProjectStatus');
Route::get('/TaskStatus/{flag}', [StatusController::class, 'TaskStatus'])->name('TaskStatus');



Route::get('/addnewresource/{project_key}', [StatusController::class, 'AddResourceView'])->name('addnewresource');;
Route::post('/addresource', [StatusController::class, 'AddResource'])->name('add.resource');
Route::get('/viewresource/{project_key}', [StatusController::class, 'ViewResource'])->name('viewresource');
Route::get('/editresourcedetails/{project_key}/{resource_key}/{resource_name}/{resource_email}/{start_resource_date}/{end_resource_date}/{task_description}/{status}', [StatusController::class, 'EditResourceDetails']);
Route::post('/updateresourcedetails', [StatusController::class, 'UpdateResource'])->name('update.resource');
Route::post('/feedback', [StatusController::class, 'feedback'])->name('task.feedback');
Route::get('/feedbacklist', [StatusController::class, 'feedbacklist'])->name('feedbacklist');


//Resource Routes
Route::get('/resourcedetails', [ResourceController::class, 'resourcedetails'])->name('resourcedetails');
Route::get('/tasklist', [ResourceController::class, 'tasklist'])->name('tasklist');
Route::get('/TaskCompleted', [ResourceController::class, 'TaskCompleted'])->name('TaskCompleted');
Route::get('/TaskInprogress', [ResourceController::class, 'TaskInprogress'])->name('TaskInprogress');
Route::get('/TaskOnhold', [ResourceController::class, 'TaskOnhold'])->name('TaskOnhold');
Route::get('/edittaskdetails/{resource_key}/{client_name}/{project_lead}/{task_description}/{status}', [ResourceController::class, 'EdittaskDetails']);
Route::post('/edittask', [ResourceController::class, 'EditTask'])->name('edit.task');
Route::get('/Resourcefeedbacklist', [ResourceController::class, 'Resourcefeedbacklist'])->name('Resourcefeedbacklist');



//Super Admin Routes
Route::get('/registeruser', [SuperAdminController::class, 'RegisterUser'])->name('registeruser');
Route::post('/addnewuser', [SuperAdminController::class, 'AddNewUser'])->name('add.newuser');
Route::get('/UserList', [SuperAdminController::class, 'UserList'])->name('UserList');

Route::get('/deleteuser/{email}', [SuperAdminController::class, 'DeleteUser']);
Route::get('/edituserinfo/{email}/{name}/{type}', [SuperAdminController::class, 'EditUserInfo']);
Route::post('/edituser', [SuperAdminController::class, 'EditUser'])->name('edit.user');






//Middleware
Auth::routes();


Route::middleware(['auth', 'user-access:user'])->group(function () {



    Route::get('/home', [HomeController::class, 'index'])->name('home');

});


Route::middleware(['auth', 'user-access:admin'])->group(function () {



    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

});



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
