<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\OTPRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerfiyController extends Controller
{
    public function verify()
    {
        return view('auth.verify');
    }

    public function verifySend(Request $request)
    {
        $request->validate([
            'code' => 'required|min:5|max:5',
        ]);

        if (Auth::user()->token == $request->code) 
        {
            $id = Auth::user()->id;
            $user = User::findOrFail(intval($id));
            $user->is_verified = 1;
            $user->save();

            return redirect()->route('admin.dashboard')->with('success', 'successfully completed');    
        }else
        {
            return back()->withErrors('Your OTP verifiction code is not equal');
        }

        return back()->withErrors('OTP is expired or invalid');
    }
}
