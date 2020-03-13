<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Category;

class FrontEndController extends Controller
{
    public function welcome() {
      $lsPost = Post::orderBy('count_like', 'desc')->take(3)->get();

      $lsLastPost = Post::orderBy('created_at', 'desc')->take(3)->get();

      return view('welcome')->with(
        ['lsPost1' => $lsPost, 'lsLastPost' => $lsLastPost] );
    }

    public function blog() {
      $lsLastPost = Post::orderBy('created_at', 'desc')->paginate(4);
      $ls3Post = Post::orderBy('created_at', 'desc')->take(3)->get();
      $allCate = Category::all();
      return view('blog')->with(['lsLastPost' => $lsLastPost,
                                'ls3Post' => $ls3Post,
                                'allCate' => $allCate]);
    }

    public function post(Request $request) {
      $id = $request->id;
      $post = Post::find($id);
      return view('post')->with(['post' => $post]);
    }

    public function createComment(Request $request, $id) {
      $username = $request->username;
      $usercomment = $request->usercomment;

      $comment = new \App\Comment;
      $comment->name = $username;
      $comment->content = $usercomment;
      $comment->post_id = $id;
      $comment->save();

      return redirect('post.html?id='.$id);
    }
}
