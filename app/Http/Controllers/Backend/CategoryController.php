<?php

namespace App\Http\Controllers\Backend;

use App\Http\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.category.index');
    }

    public function expand(Request $request)
    {
        if ($request->isMethod('post') && $request->ajax()) {
            $id = $request->id;
            $children = Category::where('parent_id', $id)->get();

            if(!$children) {
                return response()->json(['success' => false, 'html' => '']);
            }

            $returnHTML = view('widgets.category.template.ol', [
                'categories' => $children,
            ])->render();
            return response()->json(['success' => true, 'html' => $returnHTML]);
        }
    }
}
