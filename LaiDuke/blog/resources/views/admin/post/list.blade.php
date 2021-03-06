@extends('layouts.app')

@section('content')
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bootstrap Blog - B4 Template by Bootstrap Temple</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
  <!-- Custom icon font-->
  <link rel="stylesheet" href="css/fontastic.css">
  <!-- Google fonts - Open Sans-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
  <!-- Fancybox-->
  <link rel="stylesheet" href="vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="favicon.png">
  <!-- Tweaks for older IEs--><!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

</head>
<section class="latest-posts">
  <div class="container">
      <form action="{{route('post.index')}}">
          @csrf
          <label for="search">Searching by Title</label>
              <input class="form-control my-0 py-1 amber-border" name="search" type="text" placeholder="{{$searchTitle}}" aria-label="Search">

          <select class="mdb-select md-form colorful-select dropdown-primary" searchable="Search here..">
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
              <option value="3">Option 3</option>
              <option value="4">Option 4</option>
              <option value="5">Option 5</option>
          </select>
          <input type="submit" value="Search" class="btn btn-primary">
      </form>
    <header>
      <h2>Latest from the blog</h2>
      <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      <a class="btn btn-primary" href="post/create">Add</a>
    </header>
    <div class="row">
      @foreach ($lsPosts as $post)
        <div class="post col-md-4">
          <div class="post-thumbnail"><a href="post.html"><img src="{{$post->cover}}" alt="..." class="img-fluid"></a></div>
          <div class="post-details">
            <div class="post-meta d-flex justify-content-between">
              <div class="date">20 May | 2016</div>
              <div class="category"><a href="#">{{$post->category}}</a></div>
            </div><a href="post.html">
              <h3 class="h4">{{$post->title}}</h3></a>
            <p class="text-muted"> <?php echo($post->content) ?></p>
          </div>
        </div>
      @endforeach
    </div>
      {{$lsPosts->links()}}
  </div>
</section>

@endsection
