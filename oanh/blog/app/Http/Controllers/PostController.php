<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $search_title = $request->search_title;

      if(isset($search_title)) {
        $lsPost =
          Post::where('title', 'like', "%$search_title%")
          ->paginate(2);
      } else {
        $lsPost = Post::paginate(2);
      }

        return view("admin.post.list")
        ->with(['lsPost'=> $lsPost, 'search_title' => $search_title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $lsCate = Category::all();
        return view("admin.post.create")->with(
          ['lsCate' => $lsCate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $msg = [
        'required' => 'trường :attribute bắt buộc nhập',
        'max'      => 'trường :attribute có độ dài nhỏ hơn :max',
      ];
      $this->validate(
        $request,
        [
          'title' => 'required|Max:255',
          'content' => 'required'
        ],
        $msg
      );
        $post = new Post();
        $post->cover = "";
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->category_id = $request->category;
        $post->count_view = 0;
        $post->count_like = 0;
        $post->user_id = $request->user()->id;

        if($request->hasFile('cover')) {
          $name = time().".".$request->cover->extension();
          $request->cover->move(public_path('images_upload'), $name );
          $cover_path = "images_upload/".$name;
          $post->cover = $cover_path;
        }

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
        $post = Post::find($id);
        return view("admin.post.show")->with(
          ['post' => $post]);
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
      $post = Post::find($id);
      $post->delete();
      $request->session()->flash('success', 'Post was deleted!');
      return redirect()->route("post.index");
    }
}
