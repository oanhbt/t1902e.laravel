@extends('layouts.app')

@section('content')
<div class="container">
  <p>Category management</p>

  <a class="btn btn-primary" href="post/create">Add</a>
  <p></p>
  <table class="table">
    <tr>
      <th>ID</th>
      <th style="width: 50%">Name</th>
      <th>View</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>

    @foreach($listPost as $cate)
    <tr>
      <td>{{$cate->id}}</td>
      <td>{{$cate->name}}</td>
      <td><a href="post/{{$cate->id}}/edit" class="btn btn-primary">Update</a></td>
      <td>
        <form method="POST"
          action="post/{{$cate->id}}"
          onsubmit="return confirm('Sure ?')">
          @csrf
          @method('DELETE')
          <input class="btn btn-danger" type="submit" name="" value="Delete" />
        </form>

      </td>
    </tr>
    @endforeach
  </table>
</div>

@endsection
