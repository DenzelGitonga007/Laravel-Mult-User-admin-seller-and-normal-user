<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

// To have the redirects from the RouteServiceProvider, that in turn 
// will invoke the HomeController, which will have the function which 
// returns the view based on the role
Route::get('/redirects', [HomeController::class, "index"]);

// The route for adding sellers
Route::post('/addseller', [HomeController::class, "addseller"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // This dashboard is the one in the RouteServiceProvider, which in turn calls the
    //  dashboard view after login/register

    // Also, the return view dashboard, is not secure enough as it will bypass the login, 
    // such that one can login from the url by using /dashboard.
    // To counter this, check the code  from line 44
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })

    Route::get('/dashboard', [HomeController::class, "index"])->name('dashboard');


});
