@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Add new category</h2>
  <form class="form" method="post"
        action="{{asset('category')}}/{{$cate->id}}" >
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" name="name" value="{{$cate->name}}">
    </div>
    <input type="submit" value="Update" />
  </form>
</div>
@endsection
