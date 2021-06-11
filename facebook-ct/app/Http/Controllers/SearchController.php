<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $name  = $request->search;
        $check = User::where('name', 'LIKE', "%$name%")->get();
        return response()->json($check);
    }
}