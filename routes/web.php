<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;
use App\Persons;
use Illuminate\Support\Facades\Auth;
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
    return Auth::user()->role != 'admin' ? view('home') : view('dashboard.dashboard');
})->middleware('auth');

Route::get('/persons', 'PersonController@index')->middleware('auth');
Route::get('/persons/create', 'PersonController@create');

// authenticating all routes handlers for admin dashboard

Route::group(['middleware' => 'auth'], function () {

    // handling dashboard route
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('/dashboard/calendar', 'DashboardController@calendar')->name('calendar');

    // handling mailbox routes
    Route::get('/dashboard/mail/compose', 'DashboardController@mailcompose')->name('mailcompose');
    Route::get('/dashboard/mail/mailbox', 'DashboardController@mailbox')->name('mailbox');
    Route::get('/dashboard/mail/readmail', 'DashboardController@readmail')->name('readmail');

    //handling charts routes
    Route::get('/dashboard/charts/chartjs', 'DashboardController@chartjs')->name('chartjs');
    Route::get('/dashboard/charts/flot', 'DashboardController@flot')->name('flot');
    Route::get('/dashboard/charts/inline', 'DashboardController@inline')->name('inline');

    // handling other dashboard pages routes
    Route::get('/dashboard/pages/invoice', 'DashboardController@invoice')->name('invoice');
    Route::get('/dashboard/pages/profile', 'DashboardController@profile')->name('profile');
    Route::get('/dashboard/pages/ecommerce', 'DashboardController@ecommerce')->name('ecommerce');
    Route::get('/dashboard/pages/projects', 'DashboardController@projects')->name('projects');
    Route::get('/dashboard/pages/project-add', 'DashboardController@projectadd')->name('project-add');
    Route::get('/dashboard/pages/project-edit', 'DashboardController@projectedit')->name('project-edit');
    Route::get('/dashboard/pages/project-detail', 'DashboardController@projectdetail')->name('project-detail');
    Route::get('/dashboard/pages/contact', 'DashboardController@contact')->name('contact');
});

Route::get('/persons/datatable', 'PersonController@getdatatable')->middleware('auth');
Route::post('/api/datatable', 'PersonController@handledatatable')->middleware('auth');
Route::post('/persons', 'PersonController@store');

// taking route parameters of id
Route::get('/persons/{id}', 'PersonController@show')->middleware('auth');
// Route::delete('/persons/{id}', 'PersonController@destroy')->middleware('auth');
Route::post('/persons/remove/{id}', 'PersonController@destroy')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/persons/edit/{id}', 'PersonController@edit')->middleware('auth');
Route::post('/persons/edit/save', 'PersonController@modify')->middleware('auth');

Route::post('/api/nationality', 'PersonController@select2');
