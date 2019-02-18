<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send(){
        Mail::send(['html' => 'mail-template'], ['name', 'Furniture ville'], function($message){
            $message->from('support@furniturevilletexas.com', 'Furniture ville -Texas');

            $message->to('iammuaj@gmail.com', 'Body part maybe')->subject('To subject part');

        });
    }

    public function sendInvoice(Request $request) {

		$data =	$request->session()->get('maildata');
    	// dd($data);

    	
    	// dd($em);
    	Mail::send(['html' => 'mail-template'],  array(
    		'name' => $data['name'], 
    		'email' => $data['email'],
    		'link' => $data['link'] 
    	),

    		 function($message) use ($data){
    		 	

            	$message->from('support@furniturevilletexas.com', 'Furniture ville -Texas');

            	$message->to($data['email'], 'Invoice')->subject('Purchase Confirmation');

        });

        return redirect()->route('confirmation.index');
    }
}
