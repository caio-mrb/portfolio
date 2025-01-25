<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|regex:/^[0-9+\-\s()]+$/',
            'message' => 'required|min:10|max:1000'
        ]);

        Mail::raw(
            "Name: {$validatedData['name']}\n" .
            "Email: {$validatedData['email']}\n" .
            "Phone: {$validatedData['phone']}\n\n" .
            "Message:\n{$validatedData['message']}",
            function($message) use ($validatedData) {
                $message->to('caiomaxwel@hotmail.com')
                       ->subject('New Contact Form Submission')
                       ->replyTo($validatedData['email'], $validatedData['name']);
            }
        );

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}