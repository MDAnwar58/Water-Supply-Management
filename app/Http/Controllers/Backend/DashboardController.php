<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Models\UserCard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user_cards = UserCard::all();
        $calculations = Calculation::all();
        $calculate_user = Calculation::orderBy('created_at', 'DESC')->take(5)->get();
        $calculation_weekly = Calculation::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $calculation_monthly = Calculation::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
        return view('backend.dashboard.index', compact('user_cards', 'calculations', 'calculate_user', 'calculation_weekly', 'calculation_monthly'));
    }
}
