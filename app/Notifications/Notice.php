<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Controllers\NoticeController;
use App\Noticeboard;

class Notice extends Notification
{
    use Queueable;

    protected $post;

    public function __construct(Noticeboard $post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            'data' => 'We have new notice for Team ' ." added by " . auth()->user()->team_leader . "<br>" . "<small>(See noticeboard)</small>"
        ];
    }
}
