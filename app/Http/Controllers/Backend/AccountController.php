<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']);
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(5);
        return view('backend.account_manager.index', compact('users'));
    }

    public function permission($id)
    {
        $user = User::findOrfail(intval($id));
        if($user->role == 0)
        {
            $user->role = 1;
            $user->save();

            if ($user->user_status == 'এডমিন') {
                return redirect()->route('admin.account.manager')->with('success_admin', 'এডমিন পারমিশন পেয়েছে।');
            }else{
                return redirect()->route('admin.account.manager')->with('success', 'আপনার অ্যাকাউন্ট ম্যানেজার পারমিশন পেয়েছে।');
            }
        }else
        {
            $user->role = 0;
            $user->save();

            if ($user->user_status == 'এডমিন') {
                return redirect()->route('admin.account.manager')->with('admin_cancel', 'এডমিনের পারমিশন বাতিল করা হয়েছে।');
            }else{
                return redirect()->route('admin.account.manager')->with('cancel', 'আপনার অ্যাকাউন্ট ম্যানেজারের পারমিশন বাতিল করা হয়েছে।');
            }
        }
    }

    public function destroy($id)
    {
        $user = User::findOrfail(intval($id));
        $user->delete();

        return redirect()->route('admin.account.manager')->with('success', 'অ্যাকাউন্ট ম্যানেজারের অ্যাকাউন্ট বাতিল হয়েছে।');
    }
}
