<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OTPEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.otpemail2')
            ->from('announcement@parishsanfrancisco.com', 'Parokya ng San Francisco ng Assisi')
            ->subject('OTP Verification')
            ->with([
                'user' => $this->user,
                'code' => $this->code,
            ]);
    }
}
