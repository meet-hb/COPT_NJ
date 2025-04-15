<?php

namespace App\BotMan\Conversations;

use App\Jobs\SendEmailJob;
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
            $phone = $answer->getText();

            if (!preg_match('/^\d{10}$/', $phone)) {
                $this->say("❌ Please enter a valid 10-digit phone number (numbers only).");
                return $this->askPhone(); // Ask again if not valid
            }

            $this->phone = $phone;
            $this->askEmail(); // Move to next step if valid
        });
    }

    public function askEmail()
    {
        $this->ask("Your email address?", function (Answer $answer) {
            $email = $answer->getText();

            // Validate email using PHP's filter
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->say("❌ Please enter a valid email address.");
                return $this->askEmail(); // Ask again if invalid
            }

            $this->email = $email;
            $this->askMessage(); // Proceed to next step
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

            $details = [
                "name" => $this->name,
                "phone" => $this->phone,
                "email" => $this->email,
                "message" => $this->message,
                'template' => 'emails.inquiry_via_chatbot',
            ];

            dispatch(new SendEmailJob($details));

            $this->say("Thanks! your Request has been Submitted, We'll get back to you soon.😊");
        });
    }
}
