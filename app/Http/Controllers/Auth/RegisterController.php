<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OTPVerify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function registerPageShow()
    {
        return view('auth.register');
    }

    function registerStore(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required:password|same:password',
        ],
        [
            'name.required' => 'দয়াকরে আপনার নাম প্রদান করুন।',
            'email.required' => 'দয়াকরে আপনার ই-মেইলটি প্রদান করুন।',
            'password.required' => 'দয়াকরে আপনার পাসওয়ার্ডটি প্রদান করুন।',
            'password.min' => 'অবশ্যই পাসওয়ার্ড ৬ টি উপরে দিতে হবে।',
            'confirm_password.required' => 'দয়াকরে আপনার পাসওয়ার্ডটি প্রদান করুন।',
            'confirm_password.same' => 'আপনার পাসওয়ার্ডের সাথে Confirm পাসওয়ার্ডটি মেলে নাই। দয়াকরে উপরের পাসওয়ার্ডের সাথে Confirm পাসওয়ার্ড মিলিয়ে লিখুন।'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->token = rand(10000, 99999);
        $user->password = Hash::make($request->password);

        $user->save();

        if(Auth::attempt($request->only('email', 'password')))
        {
            // $otp = $user->token;
            // Cache::put([Cache::get($request->id) => $otp], now()->addSeconds(150));
            // Mail::to($request->email)->send(new OTPVerify($otp));
            return redirect()->route('admin.dashboard')->with('register_success', 'Your Account Created Successfully!');
        }else
        {
            return redirect()->back()->withErrors('register_error', 'Your Register Process Is Failed');
        }
    }
}
