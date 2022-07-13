<?php

namespace App\Mail;

use App\SendMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Feedback extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sendmessage;

    public function __construct(SendMessage $sendmessage)
    {
        $this->sendmessage = $sendmessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.sendmessage.feedback')
            ->with([
                'sendmessage' => $this->sendmessage,
            ]);
    }
}
