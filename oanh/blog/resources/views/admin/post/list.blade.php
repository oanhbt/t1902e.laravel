@extends("layouts.app")
@section("content")


<div class="container">
  <a href="{{route('post.create')}}">New Post</a>

  <form method="GET" action="{{route('post.index')}}">
    @csrf
    <div class="form-group">
      <label for="name">Tìm kiếm theo Tiêu đề:</label>
      <input type="text" class="form-control" name="search_title"
      value="{{$search_title}}">
      <input type="Submit" value="Search" class="btn btn-info my-3" />
  </form>

  <table class="table">
    <tr>
      <th>No</th>
      <th>Cover</th>
      <th>Tite</th>
      <th>View</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  @foreach($lsPost as $i => $post)
    <tr>
      <td>{{ $i + 1 }}</td>
      <td><img style="width:100px;" src="{{$post->cover}}" /></td>
      <td>{{$post->title}}</td>
      <td><a href="{{route('post.show', $post->id)}}">View</a></td>
      <td><a href="{{route('post.edit', $post->id)}}">update</a></td>
      <td>
        <form action="{{route('post.destroy', $post->id)}}"
            method="POST"
            onsubmit="return confirm('Sure ?')">
            @csrf
            <input type="hidden" name="_method" value="DELETE" />
            <input type="submit" value="Delete" />
        </form>
      </td>
    </tr>
  @endforeach
  </table>

  {{ $lsPost->links() }}
</div>




@endsection
