<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Leave;
use App\Overtime;
use App\ScheduleAdjustment;
use App\OfficialBusiness;

class ApplyController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function leave (Request $request) {
    	$apply = new Leave;
    	$apply->type = $request->type;
    	$apply->date_filed = $request->date_filed;
    	$apply->employee_name = $request->employee_name;
    	$apply->division = $request->division;
    	$apply->department = $request->department;
    	$apply->section = $request->section;
    	$apply->cost_center = $request->cost_center;
    	$apply->nol = $request->nol;
    	$apply->from_date = $request->from_date;
    	$apply->to_date = $request->to_date;
    	$apply->days = $request->days;
    	$apply->save();

    	return back();
    }

    public function overtime (Request $request) {
    	$overtime = new Overtime;
    	$overtime->type = $request->type;
    	$overtime->employee_name = $request->employee_name;
    	$overtime->employee_number = $request->employee_number;
    	$overtime->date_filed = $request->date_filed;
    	$overtime->section = $request->section;
    	$overtime->position = $request->position;
    	$overtime->department = $request->department;
    	$overtime->date_rt = $request->date_rt;
    	$overtime->in_rt = $request->in_rt;
    	$overtime->out_rt = $request->out_rt;
    	$overtime->date_ot = $request->date_ot;
    	$overtime->in_ot = $request->in_ot;
    	$overtime->out_ot = $request->out_ot;
    	$overtime->reason = $request->reason;
    	$overtime->save();

    	return back();
    }

    public function scheduleadjustment (Request $request) {
        $scheduleadjustment = new ScheduleAdjustment;
        $scheduleadjustment->type = $request->type;
        $scheduleadjustment->employee_name = $request->employee_name;
        $scheduleadjustment->original_in = $request->original_in;
        $scheduleadjustment->original_out = $request->original_out;
        $scheduleadjustment->adjusted_in = $request->adjusted_in;
        $scheduleadjustment->adjusted_out = $request->adjusted_out;
        $scheduleadjustment->reason = $request->reason;
        $scheduleadjustment->save();

        return back();
    }

    public function officialbusiness (Request $request) {
        $officialbusiness = new OfficialBusiness;
        $officialbusiness->type = $request->type;
        $officialbusiness->employee_name = $request->employee_name;
        $officialbusiness->employee_number = $request->employee_number;
        $officialbusiness->date_ob = $request->date_ob;
        $officialbusiness->time = $request->time;
        $officialbusiness->reason = $request->reason;
        $officialbusiness->nol = $request->nol;
        $officialbusiness->save();

        return back();
    }
}
