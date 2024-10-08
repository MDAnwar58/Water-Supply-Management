<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgetMail;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class ForgetPasswordController extends Controller
{
    public function forgetPassword()
    {
        return view("auth.forget-password");
    }
    public function sendEmail(Request $request)
    {
        $email = $request->input("email");
        $user = User::where("email", $email)->first();
        if ($user) {
            Mail::to($user->email)->send(new ForgetMail($user));
            return redirect()->back()->with('sendEamil', 'Email Send Successfully! Please Check Your Email');
        } else {
            return redirect()->back()->with('emailSendFail', 'Something Went Wrong!');
        }
    }
}
