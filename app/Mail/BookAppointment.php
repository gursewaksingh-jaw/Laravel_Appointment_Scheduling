<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookAppointment extends Mailable
{
    use Queueable, SerializesModels;
    public $doctorname;
    public $patientname;
    public $slotdate;
    public $slottime;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($doctorname, $patientname, $slotdate, $slottime)
    {
        //
        $this->doctorname = $doctorname;
        $this->patientname = $patientname;
        $this->slotdate = $slotdate;
        $this->slottime = $slottime;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Appointment Cancel')->view('emails.bookingappointment');
    }
}
