<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function submit(Request $request) {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required'
      ]);

       // Create new message
       $message = new Message; //eloquent
       $message->name = $request->input('name');
       $message->email = $request->input('email');
       $message->message = $request->input('message');

       // Save Message
       $message->save();

       // Redirect back to home page
       return redirect('/')->with('success', 'Message Sent');
    }
}
