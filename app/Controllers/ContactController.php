<?php

class ContactController extends Controller
{
    public function send()
    {
        if (!Csrf::verify($_POST['_token'] ?? '')) {
            http_response_code(419);
            return 'CSRF token mismatch.';
        }

        $name = $_POST['name'] ?? 'N/A';
        $email = $_POST['email'] ?? 'N/A';
        $message = $_POST['message'] ?? 'N/A';

        Mail::to('info@ndg-webdesign.net')
            ->subject('New Contact Form Submission')
            ->send(view('mail.contact', compact('name', 'email', 'message')));

        //send mail to user as confirmation
        Mail::to($email)
            ->subject('We received your message')
            ->send(view('mail.contact-confirmation', compact('name', 'email', 'message')));

        return view('contact-success');
    }
}