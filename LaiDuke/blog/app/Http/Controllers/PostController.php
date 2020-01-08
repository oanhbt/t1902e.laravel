<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchTitle = $request->search;
        if(isset($searchTitle)){
            $lsPosts = Post::where('title', 'like', "%$searchTitle%")->paginate(10);
        }
        else{
            $lsPosts = Post::paginate(10);
        }

      return view('admin.post.list') -> with([
        'lsPosts' => $lsPosts, 'searchTitle' => $searchTitle
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsCate = Category::all();
        return view('admin.post.create') -> with([
          'lsCate' => $lsCate
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if ($request->hasFile('cover')) {
            $file = $request->cover;
            $fileName = time() . '.'. $file->getClientOriginalName();
            $file->move('upload', $fileName);
            $cover = "upload/" . $fileName;
          }
          else {
            $cover = 'upload\comingsoon-square.png';
          }
      $title = $request->input('title');
      $content = $request->input('content');
      $status = $request->input('status');
      $category_id = $request->input('category');
      $userid = $request->user()->id;
      //$category = new \App\Category();
      $post = new Post();
      $post->cover = $cover;
      $post->title = $title;
      $post->content = $content;
      $post->user_id = $userid;
      $post->status = $status;
      $post->category_id = $category_id;
      $post->count_view = 0;
      $post->count_like = 0;
      $post->save();

      $request->session()->flash('success', 'Post was successful!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $post = Category::find($id);
        $post->delete();
        $request->session()->flash('success', ' delete!');
        return redirect()->route("post.index");
    }
}
