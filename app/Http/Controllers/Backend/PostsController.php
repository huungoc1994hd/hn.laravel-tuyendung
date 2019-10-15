<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        $postsModel = Posts::all();
        return view('backend.posts.index')->with([
            'postsModel' => $postsModel
        ]);
    }

    public function create()
    {
        $postsModel = new Posts();

        return view('backend.posts.create')->with([
            'postsModel' => $postsModel
        ]);
    }
}
