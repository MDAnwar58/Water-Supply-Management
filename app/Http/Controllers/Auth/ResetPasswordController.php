<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function resetPassword()
    {
        return view("auth.reset-password");
    }
    public function resetPasswordStore(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|min:6',
                'confirm_password' => 'required:password|same:password',
            ],
            [
                'password.required' => 'দয়াকরে আপনার পাসওয়ার্ডটি প্রদান করুন।',
                'password.min' => 'অবশ্যই পাসওয়ার্ড ৬ টি উপরে দিতে হবে।',
                'confirm_password.required' => 'দয়াকরে আপনার পাসওয়ার্ডটি প্রদান করুন।',
                'confirm_password.same' => 'আপনার পাসওয়ার্ডের সাথে Confirm পাসওয়ার্ডটি মেলে নাই। দয়াকরে উপরের পাসওয়ার্ডের সাথে Confirm পাসওয়ার্ড মিলিয়ে লিখুন।'
            ]
        );

        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('success', 'Your Password Reset Successfully!');
    }
}
