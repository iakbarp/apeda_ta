<?php

namespace App\Mail;

use App\contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user=$user;
        $this->contact=contact::all()->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $interval=strpos($this->user['name'],' ');
        if ($interval){
            $this->user['name']=substr($this->user['name'],0,$interval);
        }
        return $this->from(env('MAIL_USERNAME'), 'APEDA')
            ->subject('Aktivasi Akun APEDA')
            ->view('mails.verifyUserMail');

    }
}
