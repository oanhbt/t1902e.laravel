@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row">
      <!-- Latest Posts -->
      <main class="posts-listing col-lg-8">
        <div class="container">
          <div class="row">
            <!-- post -->
            @foreach($lsLastPost as $post)
            <div class="post col-xl-6">
              <div class="post-thumbnail"><a href="post.html?id={{$post->id}}"><img src="{{$post->cover}}" alt="..." class="img-fluid"></a></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="date meta-last">
                    {{ date('d  M | Y', strtotime($post->created_at)) }}
                  </div>
                  <div class="category"><a href="#">{{$post->category->name}}</a></div>
                </div><a href="post.html?id={{$post->id}}">
                  <h3 class="h4">{{$post->title}}</h3></a>
                <p class="text-muted">{!! Str::words(strip_tags($post->content), 50) !!} </p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <!-- <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div> -->
                    <div class="title"><span>{{$post->user->name}}</span></div></a>
                  <!-- <div class="date"><i class="icon-clock"></i> 2 months ago</div> -->
                  <div class="comments meta-last"><i class="icon-comment"></i>
                      {{$post->comments->count()}}
                  </div>
                </footer>
              </div>
            </div>
            @endforeach


          </div>
          <!-- Pagination -->
          {{$lsLastPost->links()}}
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
          <div class="blog-posts">
            @foreach($ls3Post as $post)
            <a href="post.html?id={{$post->id}}">
              <div class="item d-flex align-items-center">
                <div class="image"><img src="{{$post->cover}}"
                  alt="..." class="img-fluid"></div>
                <div class="title"><strong>{{$post->title}}</strong>
                  <div class="d-flex align-items-center">
                    <div class="views"><i class="icon-eye"></i> {{$post->count_view}}</div>
                    <div class="comments"><i class="icon-comment"></i>{{$post->comments->count()}}</div>
                  </div>
                </div>
              </div>
            </a>
            @endforeach
            </div>
        </div>
        <!-- Widget [Categories Widget]-->
        <div class="widget categories">
          <header>
            <h3 class="h6">Categories</h3>
          </header>

          @foreach($allCate as $cate)
          <div class="item d-flex justify-content-between">
              <a href="#">{{$cate->name}}</a><span>{{$cate->posts->count()}}</span>
          </div>
          @endforeach
        </div>
        <!-- Widget [Tags Cloud Widget]-->
        <div class="widget tags">
          <header>
            <h3 class="h6">Tags</h3>
          </header>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="#" class="tag">#Business</a></li>
            <li class="list-inline-item"><a href="#" class="tag">#Technology</a></li>
            <li class="list-inline-item"><a href="#" class="tag">#Fashion</a></li>
            <li class="list-inline-item"><a href="#" class="tag">#Sports</a></li>
            <li class="list-inline-item"><a href="#" class="tag">#Economy</a></li>
          </ul>
        </div>
      </aside>
    </div>
  </div>
@endsection
