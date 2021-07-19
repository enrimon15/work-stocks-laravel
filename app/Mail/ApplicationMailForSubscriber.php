<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationMailForSubscriber extends Mailable
{
    use Queueable, SerializesModels;

    private $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        foreach ($this->details as &$value) {
            echo($value . '\n');
        }

        return $this->subject(__('mail/application/mailContent.mailSubjectSubscriber'))
            ->markdown('mail.mail-application-toSubscriber')
            ->with('details',$this->details);
    }
}
