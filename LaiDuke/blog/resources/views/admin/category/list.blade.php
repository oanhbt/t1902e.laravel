@extends('layouts.app')

@section('content')
<div class="container">
  <p>Category management</p>






  <a class="btn btn-primary" href="category/create">Add</a>
  <p></p>
  <table class="table">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
    <?php foreach ($lsCategories as $cate): ?>
      <tr>
        <td>{{$cate->id}}</td>
        <td>{{$cate->name}}</td>
        <td> <a href="category/{{$cate->id}}/edit" class="btn btn-primary">Update</a> </td>
        <td> <form class="" action="category/{{$cate->id}}" method="post" onsubmit="return confirm('Sure??');">
          @csrf
          @method('DELETE')
          <input class="btn btn-danger" type="submit" name="" value="Delete">
        </form> </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

@endsection
