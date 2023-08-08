<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessionId = auth()->user()->id;

        $category = Category::all()->whereIn('user_id', $sessionId);

        confirmDelete();

        return view('categories.index',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sessionId = auth()->user()->id;

        $messages = [
            'required' => 'Category name cannot be empty',
        ];

        $validator = Validator::make($request->all(), [
            'category' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }


        $category = New Category;
        $category->user_id = $sessionId;
        $category->categoryName = $request->category;
        $category->save();

        Alert::toast('Category Added', 'success');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $sessionId = auth()->user()->id;

        Category::find($id)->delete();

        Alert::toast('Category Deleted', 'success');

        return redirect()->route('categories.index');
    }
}
