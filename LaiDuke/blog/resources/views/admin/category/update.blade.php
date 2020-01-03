@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Update category</h2>
  <form class='form' method="post"
  action="{{asset('category')}}/{{$cate->id}}" >
    @csrf
    @method('PUT')
    <div class="form-group">
       <label for="name">Name</label>
       <input type="text" class="form-control" value="{{$cate->name}}" name="name">
     </div>
     <input type="submit" name="" value="Update" class="btn btn-primary">
  </form>

</div>

@endsection
