<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:30', 'unique:categories'],
            'type' => ['required', 'string', 'max:255'],
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->type = $request->type;
        $category->save();
        return redirect()->back()->with('insertsuccess',"Added Successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $id = $category->id;
        $validatedData = $request->validate([
            'name' => [
                'required','string', 'max:10','min:6',
                Rule::unique('users')->ignore($id),
            ],
            'type' => ['required', 'string', 'max:255'],
        ]);
        
        $category = Category::find($id);
        $category->name = $request->name;
        $category->type = $request->type;
        $category->save();
        return redirect('/category')->with('updatesuccess',"Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $id = $category->id;
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('deletesuccess','Delete Successfully');
    }
}
