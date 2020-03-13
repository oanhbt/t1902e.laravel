@extends("layouts.app")
@section("content")
@if(count($errors) > 0)
  <div class="alert alert-danger">
    @foreach($errors->all() as $er)
      <p>{{$er}}</p>
    @endforeach
  </div>
@endif

<form method="POST" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="name">Tiêu đề:</label>
    <input type="text" class="form-control" name="title" value="{{$post->tile}}">

    <label for="name">Miêu tả ngắn gọn:</label>
    <input type="text" class="form-control" name="description" value="{{$post->description}}">

    <label for="name">Ảnh cover:</label>
    <img src="{{asset($post->cover)}}" style="width:200px;" />
    <input type="file" class="form-control" name="image">

    <label for="name">Nội dung:</label>
    <br/>
    <textarea name="content" id="content" value={!! $post->content !!}></textarea>
  </div>

  <label for="name">Thể loại:</label>
  <select multiple class="form-control" id="category" name="category[]">
    @foreach($lsCate as $cate)
      <option value="{{$cate->id}}"
       {{in_array($cate->id, 
         $ls_seleted_cate_id ) ?
         'selected' : '' }}  >
         {{$cate->name}}</option>
    @endforeach
  </select>

  <label for="name">Thẻ:</label>
    <br />
    @foreach($lsTag as $tag)
    <label class="checkbox-inline ">
      <input class="px-3" type="checkbox" value="{{$tag->id}}" name="tag[]"
        {{in_array($tag->id, $ls_seleted_tag_id ) ? 'selected' : '' }} />{{$tag->name}}
    </label>
    @endforeach
<br />
  <label for="name">Trạng thái:</label>
  <select class="form-control" id="status" name="status">
    <option value="1">Public</option>
    <option value="0">Draft</option>
    <!-- <option value="3">Cancel</option> -->
  </select>

  <input type="Submit" value="Update" class="btn btn-info my-3" />
</form>

<script src="{{asset('../vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
      var options = {
        filebrowserImageBrowseUrl: "{{asset('/laravel-filemanager?type=Images')}}",
        filebrowserImageUploadUrl: '../laravel-filemanager/upload?type=Images&_token=' + "{{ csrf_token() }}",
        filebrowserBrowseUrl: "{{asset('/laravel-filemanager?type=Files')}}",
        filebrowserUploadUrl: "{{asset('/laravel-filemanager/upload?type=Files&_token=')}}"
      };
        CKEDITOR.replace( 'content', options);
    </script>
@endsection
