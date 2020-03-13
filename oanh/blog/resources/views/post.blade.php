@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row">
      <!-- Latest Posts -->
      <main class="post blog-post col-lg-8">
        <div class="container">
          <div class="post-single">
            <div class="post-thumbnail"><img src="{{$post->cover}}" alt="..." class="img-fluid"></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="category"><a href="#">{{$post->category->name}}</a></div>
              </div>
              <h1>{{$post->title}}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
              <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                  <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                  <div class="title"><span>{{$post->user->name}}</span></div></a>
                <div class="d-flex align-items-center flex-wrap">
                  <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                  <div class="views"><i class="icon-eye"></i> 500</div>
                  <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                </div>
              </div>
              <div class="post-body">
                {!!$post->content!!}
              </div>

              <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row"><a href="#" class="prev-post text-left d-flex align-items-center">
                  <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                  <div class="text"><strong class="text-primary">Previous Post </strong>
                    <h6>I Bought a Wedding Dress.</h6>
                  </div></a><a href="#" class="next-post text-right d-flex align-items-center justify-content-end">
                  <div class="text"><strong class="text-primary">Next Post </strong>
                    <h6>I Bought a Wedding Dress.</h6>
                  </div>
                  <div class="icon next"><i class="fa fa-angle-right">   </i></div></a></div>
              <div class="post-comments">
                <header>
                  <h3 class="h6">Post Comments<span class="no-of-comments">
                    ({{$post->comments->count()}})</span></h3>
                </header>

                @foreach($post->comments as $comment)
                <div class="comment">
                  <div class="comment-header d-flex justify-content-between">
                    <div class="user d-flex align-items-center">
                      <div class="title"><strong>{{$comment->name}}</strong><span class="date">{{$comment->created_at}}</span></div>
                    </div>
                  </div>
                  <div class="comment-body">
                    <p>{{$comment->content}}</p>
                  </div>
                </div>
                @endforeach


              </div>
              <div class="add-comment">
                <header>
                  <h3 class="h6">Leave a reply</h3>
                </header>
                <form action="create_comment/{{$post->id}}" class="commenting-form" method="POST">
                  @csrf
                  <div class="row">
                    <div class="form-group col-md-6">
                      <input type="text" name="username"
                          id="username" placeholder="Name" class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                      <textarea name="usercomment" id="usercomment"
                          placeholder="Type your comment" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                      <button type="submit" class="btn btn-secondary">Submit Comment</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </main>
      <aside class="col-lg-4">
        <!-- Widget [Search Bar Widget]-->
        <div class="widget search">
          <header>
            <h3 class="h6">Search the blog</h3>
          </header>
          <form action="#" class="search-form">
            <div class="form-group">
              <input type="search" placeholder="What are you looking for?">
              <button type="submit" class="submit"><i class="icon-search"></i></button>
            </div>
          </form>
        </div>
        <!-- Widget [Latest Posts Widget]        -->
        <div class="widget latest-posts">
          <header>
            <h3 class="h6">Latest Posts</h3>
          </header>
          <div class="blog-posts"><a href="#">
              <div class="item d-flex align-items-center">
                <div class="image"><img src="img/small-thumbnail-1.jpg" alt="..." class="img-fluid"></div>
                <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                  <div class="d-flex align-items-center">
                    <div class="views"><i class="icon-eye"></i> 500</div>
                    <div class="comments"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
              </div></a><a href="#">
              <div class="item d-flex align-items-center">
                <div class="image"><img src="img/small-thumbnail-2.jpg" alt="..." class="img-fluid"></div>
                <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                  <div class="d-flex align-items-center">
                    <div class="views"><i class="icon-eye"></i> 500</div>
                    <div class="comments"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
              </div></a><a href="#">
              <div class="item d-flex align-items-center">
                <div class="image"><img src="img/small-thumbnail-3.jpg" alt="..." class="img-fluid"></div>
                <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                  <div class="d-flex align-items-center">
                    <div class="views"><i class="icon-eye"></i> 500</div>
                    <div class="comments"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
              </div></a></div>
        </div>
        <!-- Widget [Categories Widget]-->
        <div class="widget categories">
          <header>
            <h3 class="h6">Categories</h3>
          </header>
          <div class="item d-flex justify-content-between"><a href="#">Growth</a><span>12</span></div>
          <div class="item d-flex justify-content-between"><a href="#">Local</a><span>25</span></div>
          <div class="item d-flex justify-content-between"><a href="#">Sales</a><span>8</span></div>
          <div class="item d-flex justify-content-between"><a href="#">Tips</a><span>17</span></div>
          <div class="item d-flex justify-content-between"><a href="#">Local</a><span>25</span></div>
        </div>
      </aside>
    </div>
  </div>

@endsection
