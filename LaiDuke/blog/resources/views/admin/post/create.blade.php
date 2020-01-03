@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Add new category</h2>
  <form class="form" method="post"
        action="{{asset('post')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="usr">Cover link</label>
        <input type="file" name="cover">
    <br>
      <label for="usr">Title</label>
      <input type="text" class="form-control" name="title"  required="true">
      <label for="status">Status</label>
      <select class="form-control" name="status">
        <option value="1">Public</option>
        <option value="0">Draft</option>
      </select>
      <label for="Category">Category</label>
      <select class="form-control" name="category">
        @foreach($lsCate as $cate)
          <option value="{{$cate->id}}">{{$cate->name}}</option>
        @endforeach
      </select>
      <label for="usr">Content</label>
      <br>
      <textarea name="content" rows="8" cols="150"  required="true"></textarea>
    </div>
    <input type="submit" value="Add" />
  </form>
</div>
@endsection
