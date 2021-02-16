<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

use \DrewM\MailChimp\MailChimp;

class newsletterController extends Controller
{
    /**
     * Subscribe email to a Suscribers list.
     *     
     */
    public function subscribe(Request $request){ 
        $email = $request->newsletterEmail;
        $list_id = '172d963bae';//list Suscribers
        $key = '705f09768e3c5f59e2cda8ce81e07c58-us15';

        $MailChimp = new MailChimp($key);
        $MailChimp->verify_ssl = false;
        
        $result = $MailChimp->post("lists/$list_id/members", [
            'email_address' => $email,
            'status'        => 'subscribed',
        ]);

        if($result){
            return response()->json(['response' => 'success']);
        }
        else{
            return response()->json(['response' => 'error', 'message' => 'Mmg error']);
        }
    }
}
