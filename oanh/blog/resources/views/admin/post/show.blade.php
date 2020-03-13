
@extends("layouts.app")
@section("content")
<div class="container">
  <div class="form-group">
    <label for="name">Tiêu đề:</label>
    <input type="text" class="form-control" name="title" value="{{$post->tile}}" disabled>

    <label for="name">Ảnh cover:</label>
    <img src="{{asset($post->cover) }}" style="width:200px;" />
    <br/>

    <label for="name">Nội dung:</label>
    <br/>
    <div style="border: 1px solid gray; padding: 5px"
    name="content" id="content">
      {!! $post->content !!}
    </div>
  </div>


<br/>
  <label for="name">Trạng thái:</label>
  @if($post->status == 1)
  <input class="form-control" type="text" value="Public" disabled>
  @else
  <input class="form-control" type="text" value="Draft" disabled>
  @endif


</div>



@endsection
