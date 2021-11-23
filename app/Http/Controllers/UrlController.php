<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class UrlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('dashboard', ['urls' => Url::all()]);
    }

    public function shorten(Request $request)
    {
        $request->validate([
            'destination' => 'required|url',
        ]);

        Url::create([
                        "destination" => $request->destination, 
                        "slug" => Str::random(5)
                    ]);

        return redirect()->back()->with('success', 'Url Shortened and added to Database');
    }


    public function redirectToShort(Url $url)
    {
        return redirect($url->destination);
    }
}
