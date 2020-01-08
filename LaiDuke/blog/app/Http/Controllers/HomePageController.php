<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class HomePageController extends Controller
{
    public function welcome(){
        $lsPost = Post::orderBy('count_like', 'desc') -> take(3) -> get();
        $lastestPost = Post::orderBy('created_at', 'desc') -> take(3) -> get();
        return view('welcome') -> with(['lsPost' => $lsPost, 'lastestPost' => $lastestPost]);
    }
    public function blog(){
        $lsLastPost = Post::orderBy('created_at', 'desc') ->paginate(4);
        return view('blog') -> with(['lsLastPost' => $lsLastPost]);
    }
    public function post(Request $request){
        $Post = Post::find($request->id);
    return view('post') -> with(['Post' => $Post]);
    }
}
