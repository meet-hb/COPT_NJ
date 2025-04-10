<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BotMan\Conversations\ContactFormConversation;

class ChatController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        // Start form conversation directly when message received
        $botman->hears('{message}', function (BotMan $botman, $message) {
            $botman->startConversation(new ContactFormConversation());
        });

        $botman->listen();
    }
}
