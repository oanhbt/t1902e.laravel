@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Add new category</h2>
  <form class="form" method="post"
        action="{{asset('post')}}" >
    @csrf
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" name="name">
    </div>
    <input type="submit" value="Add" />
  </form>
</div>
@endsection
