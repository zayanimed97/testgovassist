<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class APIController extends Controller
{
    public function shortenUrl(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'destination' => 'required|url',
        ]);
        if (empty($validated->errors()->messages())) {

            $slug = Str::random(5);
            
            $short = Url::create([
                "destination" => $request->destination, 
                "slug" => $slug
            ]);
            $short = $short->fresh();
            return response()->json($short);
        } else {
            return response()->json($validated->errors()->messages());
        }

    }
}
