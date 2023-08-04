<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function loginPage()
    {
        return view('auth.login');
    }

    function loginStore(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'email.required' => 'দয়াকরে আপনার ই-মেইলটি প্রদান করুন।',
            'password.required' => 'দয়াকরে আপনার পাসওয়ার্ডটি প্রদান করুন।',
        ]);

        try {
            if (Auth::guard('web')->attempt(['email'=>$request->email, 'password'=>$request->password])) {
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->back()->with('Login_error', 'Your Login Request Is Failed please Create a account this website then try to login');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('Login_error', $e->getMessage());
        }
    }

    function logouts()
    {
        Auth::guard('web')->logout();

        return redirect()->route('login');
    }
}
