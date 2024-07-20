<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AuditTrail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page = [
            'name'  =>  'Dashboard',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Dashboard' => '/dashboard')
        ];

        $count_all = Procurement::count();
        $count_activities = Procurement::where('alterproc',0)->count();
        $count_alternative = Procurement::where('alterproc',1)->count();

        // AuditTrail::create("index","The user has accessed the Home Page Section");
        return view('home',compact('page','count_all','count_activities','count_alternative'));
    }
}
