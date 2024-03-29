<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{


    public function create()
    {
        return view('form.contact');
    }

    public function store(Request $request)
    {
        $data = Input::all();


            Mail::send('form.hello', $data, function($message) use ($data)
            {
                $message->from($data['email'] , $data['name']);

                $message->to('danicourt.louise@gmail.com', 'Louise Danicourt')->cc('danicourt.louise@gmail.com')->subject('contact request');


            });

        return redirect()->route('contact')
        ->with('success', 'Votre mail a bien été envoyé, une réponse vous sera apportée le plus rapidement possible');
    }
}
