<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Models\Jar;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'permission']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_card_id' => 'required|integer',
            'water_jar' => 'nullable|integer',
            'empty_jar' => 'nullable|integer',
            'full_jar_left' => 'nullable|integer',
            'payment_money' => 'required',
            'total_due' => 'nullable',
            'customer_signature' => 'required|Max:255',
        ],
        [
            'user_card_id.required' => 'আপনার গ্রাহকের আইডি প্রদান করুন।',
            'payment_money.required' => 'দয়াকরে টাকা প্রদান করুন।',
            'customer_signature.required' => 'দয়াকরে গ্রাহকের সাক্ষর প্রদান করুন।',
        ]);

        $calculation = new Calculation;
        $calculation->user_card_id = $request->user_card_id;
        $calculation->water_jar = $request->water_jar;
        $calculation->empty_jar = $request->empty_jar;
        $calculation->full_jar_left = $request->full_jar_left;
        $calculation->payment_money = $request->payment_money;
        $calculation->total_due = $request->total_due;
        $calculation->customer_signature = $request->customer_signature;
        $calculation->save();

        $user_card_id = $calculation->user_card_id;
        return redirect()->route('admin.user.card.show', $user_card_id)->with('success', 'আপনার গ্রাহকের তথ্য লিস্টে জমা হয়েছে।');
    }

    public function edit($id)
    {
        $calculation = Calculation::findOrFail(intval($id));
        $jars = Jar::all();
        return view('backend.user_card.calculation_edit', compact('calculation', 'jars'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_card_id' => 'required|integer',
            'water_jar' => 'nullable|integer',
            'empty_jar' => 'nullable|integer',
            'full_jar_left' => 'nullable|integer',
            'payment_money' => 'nullable',
            'total_due' => 'nullable',
            'customer_signature' => 'required|Max:255',
        ],
        [
            'customer_signature.required' => 'দয়াকরে গ্রাহকের সাক্ষর প্রদান করুন।',
        ]);

        $calculation = Calculation::findOrFail(intval($id));
        $calculation->user_card_id = $request->user_card_id;
        $calculation->water_jar = $request->water_jar;
        $calculation->empty_jar = $request->empty_jar;
        $calculation->full_jar_left = $request->full_jar_left;
        $calculation->payment_money = $request->payment_money;
        $calculation->total_due = $request->total_due;
        $calculation->customer_signature = $request->customer_signature;
        $calculation->update();

        $user_card_id = $calculation->user_card_id;
        return redirect()->route('admin.user.card.show', $user_card_id)->with('success', 'আপনার গ্রাহকের হিসাবের তথ্য আপডেট হয়েছে।');
    }

    public function destroy($id)
    {
        $calculation = Calculation::findOrFail(intval($id));
        $calculation->delete();

        $user_card_id = $calculation->user_card_id;
        return redirect()->route('admin.user.card.show', $user_card_id)->with('success', 'আপনার গ্রাহকের তথ্য ডিলিট হয়েছে।');
    }
}
