<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jar;
use Illuminate\Http\Request;
use Whoops\Run;

class JarController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'permission', 'is_admin']);
    }

    public function index()
    {
        $jars = Jar::all();
        return view('backend.jar.index', compact('jars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|integer',
        ]);
        $jars = Jar::all();
        if($jars->count() < 1)
        {
            $jar = new Jar();
            $jar->price = $request->price;
            $jar->save();

            return redirect()->route('admin.jar.price')->with('success', 'জারের দাম জমা হয়েছে।');
        }
        return redirect()->back()->with('error', 'জারের দাম আগে এড করা আছে। দয়া করে জারের টেবিলে দেখুন।');
    }

    public function edit($id)
    {
        $jar = Jar::findOrFail(intval($id));
        return view('backend.jar.edit', compact('jar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|integer',
        ]);

        $jar = Jar::findOrFail(intval($id));
        $jar->price = $request->price;
        $jar->update();

        return redirect()->route('admin.jar.price')->with('success', 'জারের দাম ইডিট হয়েছে।');

    }

    public function destroy($id)
    {
        $jar = Jar::findOrFail(intval($id));
        $jar->delete();

        return redirect()->route('admin.jar.price')->with('success', 'জারের দাম ডিলিট হয়েছে।');
    }
}
