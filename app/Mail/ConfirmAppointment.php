<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ConfirmAppointment extends Mailable
{
    use Queueable, SerializesModels;
    public $patientname;
    public $doctorname;
    public $slot;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($patientname, $doctorname, $slot)
    {
        //
        $this->patientname = $patientname;
        $this->doctorname = $doctorname;
        $this->slot = $slot;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Appointment Approved')->view('emails.confirmappointment');
    }
}
