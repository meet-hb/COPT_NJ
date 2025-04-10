<?php

namespace App\BotMan\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\DB;

class ContactFormConversation extends Conversation
{
    protected $name, $phone, $email, $message;

    public function run()
    {
        $this->askName();
    }

    public function askName()
    {
        $this->ask("What's your name?", function (Answer $answer) {
            $this->name = $answer->getText();
            $this->askPhone();
        });
    }

    public function askPhone()
    {
        $this->ask("Your phone number?", function (Answer $answer) {
            $this->phone = $answer->getText();
            $this->askEmail();
        });
    }

    public function askEmail()
    {
        $this->ask("Your email address?", function (Answer $answer) {
            $this->email = $answer->getText();
            $this->askMessage();
        });
    }

    public function askMessage()
    {
        $this->ask("Your message?", function (Answer $answer) {
            $this->message = $answer->getText();

            DB::table('inquiries')->insert([
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'message' => $this->message,
                'created_at' => now(),
            ]);

            $this->say("Thanks! We'll get back to you soon.");
        });
    }
}
