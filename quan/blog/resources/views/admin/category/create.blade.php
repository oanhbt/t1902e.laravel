@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Add new category</h2>
  <form class='form' method="post"
  action="{{asset('category')}}" >
    @csrf
    <div class="form-group">
       <label for="name">Name</label>
       <input type="text" class="form-control" placeholder="Enter name" name="name">
     </div>
     <input type="submit" name="" value="Add" class="btn btn-primary">
  </form>

</div>

@endsection
