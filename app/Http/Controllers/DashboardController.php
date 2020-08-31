<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // handling dashboard routes

    public function dashboard()
    {
        return Auth::user()->role == 'admin' ?  view('dashboard.dashboard') : view('errors.404');
    }

    public function calendar()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.calendar') : view('errors.404');
    }

    // handling mail routes

    public function mailcompose()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.mailbox.compose') : view('errors.404');
    }
    public function mailbox()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.mailbox.mailbox') : view('errors.404');
    }
    public function readmail()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.mailbox.read-mail') : view('errors.404');
    }

    // handling charts routes

    public function chartjs()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.charts.chartjs') : view('errors.404');
    }
    public function flot()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.charts.flot') : view('errors.404');
    }
    public function inline()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.charts.inline') : view('errors.404');
    }

    // handling other dashboard pages routes

    public function invoice()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.pages.invoice') : view('errors.404');
    }
    public function profile()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.pages.profile') : view('errors.404');
    }
    public function ecommerce()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.pages.e-commerce') : view('errors.404');
    }
    public function projects()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.pages.projects') : view('errors.404');
    }
    public function projectadd()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.pages.project-add') : view('errors.404');
    }
    public function projectedit()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.pages.project-edit') : view('errors.404');
    }
    public function projectdetail()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.pages.project-details') : view('errors.404');
    }
    public function contact()
    {
        return Auth::user()->role == 'admin' ? view('dashboard.pages.contacts') : view('errors.404');
    }
}
