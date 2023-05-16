<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\RegisterNotification;
use Carbon;

class DoctortoUserNotification extends Notification
{
    use Queueable;
    public $doctorname;
    public $patientname;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($doctorname, $patientname)
    {
        //
        $this->doctorname = $doctorname;
        $this->patientname = $patientname;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $notificationdata = RegisterNotification::create([
            'user_id_from' => 1,
            'user_id_to' => 2,
            'type' => 'App\Notifications\DoctortoUserNotification',
            'notifiable_type' => 'App\Models\User',
            'notifiable_id' => $notifiable->id,
            'data' => $this->doctorname,
            'created_at' => '2016-12-06 06:56:01',
            'updated_at' => '2016-12-06 06:56:01',
        ]);
        return;
    }

    public function build()
    {
    }
}
