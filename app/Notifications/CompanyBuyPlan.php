<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CompanyBuyPlan extends Notification
{
    use Queueable;
    protected $companyName;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($company)
    {
        $this->companyName = $company->name;
        $this->companyId = $company->id;
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
                'companyId'=> $this->companyId,
                'adminMessage'=> $this->companyName.' request packge plan. '
            ];
        else
            return [
                'message'=> $this->companyName.' request packge plan. ',
                'companyId'=> $this->companyId,
            ];
    }
}
