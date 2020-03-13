<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lsCategoires = Category::all();
        return view('admin.category.list')->with([
          'lsCategoires' => $lsCategoires
        ]   );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');

        //$category = new \App\Category();
        $category = new Category();
        $category->name = $name;
        $category->save();

        $request->session()->flash('success', 'Category was successful!');
        return redirect()->route("category.index");
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
    public function edit($id)
    {
      $cate = Category::find($id);
        return view('admin.category.update')->with(
          ['cate' => $cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $cate = Category::find($id);
      $cate->name = $request->input('name');
      $cate->save();
      $request->session()->flash('success', 'Category was updated!');
      return redirect()->route("category.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $cate = Category::find($id);
        $cate->delete();
        $request->session()->flash('success', 'Category was deleted!');
        return redirect()->route("category.index");
    }
}
