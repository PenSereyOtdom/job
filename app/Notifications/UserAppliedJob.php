<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserAppliedJob extends Notification
{
    use Queueable;
    protected $companyName;
    protected $userName;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($company=null, $user=null)
    {
        if($company != null & $user!=null)
        {
            $this->companyName = $company->name;
            $this->userName = $user->name;
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        if($this->companyName)
            return [
                'message'=>'A user has applied for a job',
                'adminMessage'=>$this->userName.' has applied for a job at '.$this->companyName,
            ];

        else
            return [
                'message'=>'A user has applied for a job',
            ];
    }
}
