<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recover_url, $username)
    {
        //
        $this->recover_url = $recover_url;
        $this->username = $username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.emails.reset-password',['recover' => $this->recover_url , 'name' => $this->username])
            ->from('info@purewash.com' ,'pure wash')
            ->subject('reset password')
            ->bcc('elbiheiry2@gmail.com');
    }
}
