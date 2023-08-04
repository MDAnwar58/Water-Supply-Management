<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Models\Jar;
use App\Models\UserCard;
use Illuminate\Http\Request;

class UserCardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'permission']);
    }
    
    public function index()
    {
        $user_cards = UserCard::orderBy('created_at', 'DESC')->get();
        return view('backend.user_card.index', compact('user_cards'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_no' => 'required|integer|unique:user_cards',
            'number' => 'required|min:10|max:11',
            'name' => 'required|Max:255',
            'home_institution' => 'required|Max:255',
            'address' => 'required|Max:255',
            'route_no' => 'required|integer',
            'own_jar' => 'required|Max:255',
            'own_dispenser' => 'required|Max:255',
        ],
        [
            'id_no.required' => 'দয়াকরে গ্রাহকের আইডি প্রদান করুন।',
            'number.required' => 'দয়াকরে গ্রাহকের মোবাইল নাম্বার প্রদান করুন।',
            'name.required' => 'দয়াকরে গ্রাহকের নাম প্রদান করুন।',
            'home_institution.required' => 'দয়াকরে গ্রাহকের বাসা/প্রতিষ্ঠানের নাম প্রদান করুন।',
            'address.required' => 'দয়াকরে গ্রাহকের ঠিকানা প্রদান করুন।',
            'route_no.required' => 'দয়াকরে গ্রাহকের রুট নং প্রদান করুন।',
            'own_jar.required' => 'দয়াকরে জারটি গ্রাহকের কিনা সেটি নির্বাচন করুন।',
            'own_dispenser.required' => 'দয়াকরে ডিসপেন্সারটি গ্রাহকের কিনা সেটি নির্বাচন করুন।',
        ]);

        $user_card = new UserCard;
        $user_card->id_no = $request->id_no;
        $user_card->number = $request->number;
        $user_card->name = $request->name;
        $user_card->home_institution = $request->home_institution;
        $user_card->address = $request->address;
        $user_card->route_no = $request->route_no;
        $user_card->own_jar = $request->own_jar;
        $user_card->own_dispenser = $request->own_dispenser;
        $user_card->save();

        return redirect()->route('admin.user.card')->with('success', 'আপনার গ্রাহকের তথ্য লিস্টে জমা হয়েছে।');
    }

    public function show($id)
    {
        $user_card = UserCard::findOrfail(intval($id));
        $calculations = Calculation::orderBy('created_at', 'DESC')->get();
        $jars = Jar::all();

        return view('backend.user_card.show', compact('user_card', 'calculations', 'jars'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_no' => 'required|integer',
            'number' => 'required|min:10|max:11',
            'name' => 'required|Max:255',
            'home_institution' => 'required|Max:255',
            'address' => 'required|Max:255',
            'route_no' => 'required|integer',
            'own_jar' => 'required|Max:255',
            'own_dispenser' => 'required|Max:255',
        ],
        [
            'id_no.required' => 'দয়াকরে গ্রাহকের আইডি প্রদান করুন।',
            'number.required' => 'দয়াকরে গ্রাহকের মোবাইল নাম্বার প্রদান করুন।',
            'name.required' => 'দয়াকরে গ্রাহকের নাম প্রদান করুন।',
            'home_institution.required' => 'দয়াকরে গ্রাহকের বাসা/প্রতিষ্ঠানের নাম প্রদান করুন।',
            'address.required' => 'দয়াকরে গ্রাহকের ঠিকানা প্রদান করুন।',
            'route_no.required' => 'দয়াকরে গ্রাহকের রুট নং প্রদান করুন।',
            'own_jar.required' => 'দয়াকরে জারটি গ্রাহকের কিনা সেটি নির্বাচন করুন।',
            'own_dispenser.required' => 'দয়াকরে ডিসপেন্সারটি গ্রাহকের কিনা সেটি নির্বাচন করুন।',
        ]);
        
        $user_card = UserCard::findOrfail(intval($id));
        $user_card->id_no = $request->id_no;
        $user_card->number = $request->number;
        $user_card->name = $request->name;
        $user_card->home_institution = $request->home_institution;
        $user_card->address = $request->address;
        $user_card->route_no = $request->route_no;
        $user_card->own_jar = $request->own_jar;
        $user_card->own_dispenser = $request->own_dispenser;
        $user_card->update();

        $user_card_id = $user_card->id;
        return redirect()->route('admin.user.card.show', $user_card_id)->with('success', 'আপনার গ্রাহকের তথ্য আপডেট করুন হয়েছে।');
    }

    public function destroy($id)
    {
        $user_card = UserCard::findOrfail(intval($id));
        $calculations = Calculation::where('user_card_id', $user_card->id)->get();
        if($calculations->count() >0)
        {
            foreach ($calculations as $calculation) {
                $calculation->delete();
            }
            $user_card->delete();
        }
        
        $user_card->delete();

        return redirect()->route('admin.user.card')->with('success', 'আপনার গ্রাহকের তথ্য লিস্টে থেকে ডিলিট হয়েছে');
    }
}
