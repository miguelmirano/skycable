<?php

namespace App\Http\Controllers;

use Auth;
use Request;
use App\Noticeboard;
use App\CompanyNoticeboard;
use App\Leave;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->is_admin == 0) {
            $leave = Leave::all()->sortByDesc('id');
            $notices = CompanyNoticeboard::all()->sortByDesc('id');
            $post  = Noticeboard::where('team_leader', Auth::user()->team_leader)->get()->sortByDesc('id');
            return view('user_home', compact('notices', 'post', 'leave'));
    }   
        else 
    {
            $leave = Leave::all()->sortByDesc('id');
            $notices = CompanyNoticeboard::all()->sortByDesc('id');
            $post  = Noticeboard::where('team_leader', Auth::user()->team_leader)->get()->sortByDesc('id');
            return view('home', compact('notices', 'post', 'leave'));
        }
    }
}
