<?php


namespace App\Http\Controllers;

use Mail;

use Illuminate\Http\Request;

class ContactController extends Controller{    
    /**
     * Send email with contact information.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request){
        //Email to user
       	Mail::send('emails.contact', ['name' => $request->name, 
       								'subject' => $request->subject, 
       								'body' => $request->message,
       								], function($message) use ($request){
            $message->from('test@entertainermedia.net', 'Universal Translations support');
            $message->to($request->email, $request->name)->subject($request->subject);

        });

        //Email to admin
        Mail::send('emails.contact_admin', ['name' => $request->name,
            'subject' => $request->subject,
            'body' => $request->message,
        ], function($message) use ($request){
            $message->from($request->email, $request->name);
            $emails = explode(",", Voyager::setting('form_contact_email') );
            foreach ($emails as $email){
                $message->to($email, 'Universal Translations support')->subject($request->subject);
            }
        });

        return response()->json(['response' => 'success']);
        
    }
}
