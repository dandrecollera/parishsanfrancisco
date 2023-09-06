<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $link)
    {
        $this->user = $user;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.certificateemail')
            ->from('announcement@parishsanfrancisco.com', 'Parokya ng San Francisco ng Assisi')
            ->subject('Certificate Approved')
            ->with([
                'user' => $this->user,
                'link' => $this->link,
            ]);
    }
}
