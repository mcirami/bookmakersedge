<?php


namespace App\Services;
use App\Mail\PickSubmitted;
use App\User;

use Illuminate\Support\Facades\Mail;

class MailService {

    public function newPickSubmitted() {

        $memberEmails = User::whereHas('roles', function($q){$q->where('name', 'subscriber');})->pluck('email');

        //$memberEmails = array('mcirami@gmail.com', 'matteo@mscwebservices.net');

        Mail::bcc($memberEmails)
            ->queue(new PickSubmitted());
    }
}
