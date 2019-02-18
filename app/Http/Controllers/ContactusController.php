<?php

namespace App\Http\Controllers;

use App\Contactus;
use App\Subscriber;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request){

        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');
        Contactus::create([
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        ]);
        return back()->with('success_message', 'Your Message successfully delivered');
    }

    public function show(Contactus $contactus)
    {
        //
    }

    public function subscribe(Request $request){
        Subscriber::create([
            'mail' => $request->input('mail'),
            'status' => true
        ]);
        $msg = $request->input('mail') . ' is subscribed for Newsletter';
        return back()->with('success_message', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contactus $contactus)
    {
        //
    }
}