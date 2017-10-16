<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CalendarController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function my_calendar () {
    	return view('sky/my_calendar');
    }

    public function team_calendar () {
    	return view('sky/team_calendar');
    }

    public function company_calendar () {
    	return view('sky/company_calendar');
    }
}
