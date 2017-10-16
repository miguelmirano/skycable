<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Noticeboard;
use App\User;
use Notification;
use App\Notifications\Notice;
use Auth;
use App\CompanyNoticeboard;
use App\Notifications\CompanyNotice;


class NoticeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function notice (Request $request) {
        $post = new Noticeboard;
        $post->team_leader = $request->team_leader;
        $post->subject = $request->subject;
        $post->description = $request->description;
        if ($post->save()){
        	$user = User::where('team_leader', Auth::user()->team_leader)->get();
        	Notification::send($user, new Notice($post));
        };

        return back()
            ->with('post', $post);
    }

    public function company_notice (Request $request) {
        $notices = new CompanyNoticeboard;
        $notices->team_leader = $request->team_leader;
        $notices->subject = $request->subject;
        $notices->description = $request->description;
        if ($notices->save()){
            $user = User::all();
            Notification::send($user, new CompanyNotice($notices));
        };

        return back()
            ->with('notices', $notices);
    }
}
