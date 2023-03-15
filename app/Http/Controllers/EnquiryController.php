<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    //send Enquiry
    public function sendEnquiry(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $name = $req->name;
        $email = $req->email;
        $subject = $req->subject;
        $message = $req->message;


        Enquiry::create([
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        ]);

        return "OK";
    }

    public function deleteMessage($id)
    {
        $message = Enquiry::find($id);
        $message->delete();
        return back();
    }
}
