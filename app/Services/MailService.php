<?php

namespace App\Services;

use Mail;

class MailService
{
    public function mail($data)
    {
        Mail::send('emails.listing', $data, function ($message) {

            $message->from(env('REALTOR_EMAIL_FROM'));

            $recipients = $this->getRecipients();
            
            $message->to($recipients)->subject("Real Estate Listings " . date('M j Y'));

        });
    }

    private function getRecipients()
    {
        return explode(',', env('REALTOR_EMAIL_TO'));
    }
}
