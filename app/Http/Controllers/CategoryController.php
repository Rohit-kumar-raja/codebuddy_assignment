<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $data = Category::whereNull('parent_id')->get();
        $all_category = Category::all();
        return view('category', ['categories' => $data, 'all_category' => $all_category]);
        // return $data;
    }
    public function store(Request $request)
    {
        try {
            Category::create($request->except(['_token']));
            return back()->with('success', 'Category SuccessFully added into the Database');
        } catch (Exception $e) {
            return back()->with('error', 'Somthing Went Wrong');
        }
    }
    public function edit($id)
    {
        $data = Category::find($id);
        $all_category = Category::get();

        return view('category-edit', ['data' => $data,'all_category'=>$all_category]);
    }

    public function update(Request $request, $id)
    {
        Category::where('id', $id)->update($request->except(['_token','_method']));
        return redirect()->route('category.index')->with('success', 'Category SuccessFully updated into the Database');

    }
}
