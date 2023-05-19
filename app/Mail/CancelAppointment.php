<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CancelAppointment extends Mailable
{
    use Queueable, SerializesModels;
    public $doctorname;
    public $patientname;
    public $slot;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($doctorname, $patientname, $slot)
    {
        //
        $this->doctorname = $doctorname;
        $this->patientname = $patientname;
        $this->slot = $slot;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Appointment Cancel')->view('emails.cancelappointment');
    }
}
