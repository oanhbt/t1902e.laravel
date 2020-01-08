@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Latest Posts -->
            <main class="posts-listing col-lg-8">
                <div class="container">
                    <div class="row">
                        @foreach($lsLastPost as $Post)
                        <!-- post -->
                        <div class="post col-xl-6">
                            <div class="post-thumbnail"><a href="post/detail?id={{$Post->id}}"><img src="{{$Post->cover}}" alt="..." class="img-fluid"></a></div>
                            <div class="post-details">
                                <div class="post-meta d-flex justify-content-between">
                                    <div class="date meta-last">{{$Post->created_at->format('M-d|Y')}}</div>
                                    <div class="category"><a href="#">{{$Post->category->name}}</a></div>
                                </div><a href="post.detail?id={{$Post->id}}">
                                    <h3 class="h4">{{$Post->title}}</h3></a>
                                <p class="text-muted">{!! Str::words(strip_tags($Post->content), 20) !!}...</p>
                                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                        <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                                        <div class="title"><span>{{$Post->user->name}}</span></div></a>
                                    <div class="comments meta-last"><i class="icon-comment"></i>{{$Post->comment->count()}}</div>
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
