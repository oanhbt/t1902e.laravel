@extends("layouts.app")
@section("content")

<div class="container">
  <form method="POST"
    action="{{asset('post')}}"
    enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Tiêu đề:</label>
      <input type="text" class="form-control" name="title">

      <label for="name">Ảnh cover:</label>
      <input type="file" class="form-control" name="cover">

      <label for="name">Nội dung:</label>
      <br/>
      <textarea name="content" id="content"></textarea>
    </div>
  <br />
    <label for="status">Trạng thái:</label>
    <select class="form-control" id="status" name="status">
      <option value="1">Public</option>
      <option value="0">Draft</option>
    </select>

    <br/>
    <label for="category">Nhóm:</label>
    <select class="form-control" id="category" name="category">
      @foreach($lsCate as $cate)
        <option value="{{$cate->id}}">{{$cate->name}}</option>
      @endforeach
    </select>
    <br/>

    <input type="Submit" value="Tạo mới" class="btn btn-info my-3" />
  </form>
</div>


<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'content' ,
  {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>
@endsection
