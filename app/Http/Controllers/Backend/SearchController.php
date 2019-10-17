<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Posts;

class SearchController extends Controller
{
    public function find(Request $request) {
        $posts = Posts::where('title', 'like', '%' . $request->q . '%')
            ->with('avatar')
            ->get();

        return response()->json($posts);
    }
}
