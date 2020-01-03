<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $listPost = \App\Category::all();
        return view('admin.post.list')->with(['listPost' => $listPost]
      );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
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
      $post = new post();
      $post->name = $name;
      $post->save();

      $request->session()->flash('success', 'Category was successful!');
      return redirect()->route("post.index");
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
      $cate = post::find($id);
      return view('admin.post.update')->with([
        'cate'=>$cate
      ]);
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
      $cate = post::find($id);
      $cate->name = $request->input('name');
      $cate->save();
      $request->session()->flash('success','Category was update!');
      return redirect()->route("post.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cate = post::find($id);
      $cate->delete();
      $request->session()->flash('success','Category was delete!');
      return redirect()->route("post.index");
    }
}
