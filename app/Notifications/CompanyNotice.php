<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Controllers\NoticeController;
use App\CompanyNoticeboard;

class CompanyNotice extends Notification
{
    use Queueable;

    protected $notices;

    public function __construct(CompanyNoticeboard $notices)
    {
        $this->notices = $notices;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            'data' => 'We have new notice for Company ' ." added by " . auth()->user()->team_leader . "<br>" ."<small>(See noticeboard)</small>"
        ];
    }
}
