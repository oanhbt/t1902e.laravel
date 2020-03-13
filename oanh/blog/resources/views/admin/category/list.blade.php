@extends('layouts.app')

@section('content')
<div class="container">
  <p>Category management</p>
  <!-- <a class="btn btn-primary" href="category/create">Add</a> -->

  <button type="button" class="btn btn-primary"
  data-toggle="modal" data-target="#exampleModal"
  data-whatever="@mdo">Add</button>

  <p></p>
  <table class="table">
    <tr>
      <th>ID</th>
      <th style="width: 50%">Name</th>
      <th >Update</th>
      <th>Delete</th>
    </tr>

    @foreach($lsCategoires as $cate)
      <tr>
        <td>{{$cate->id}}</td>
        <td>{{$cate->name}}</td>
        <td><a href="category/{{$cate->id}}/edit" class="btn btn-primary">Update</a></td>
        <td>
          <form method="POST"
                action="category/{{$cate->id}}"
                onsubmit="return confirm('Sure ?')">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete" />
          </form>
        </td>
      </tr>
    @endforeach
  </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- <form class="form" method="post"
              action="{{asset('category')}}" >
          @csrf
          <div class="form-group">
            <label for="usr">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
          <input type="submit" value="Add" />
        </form> -->
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sendCategory">Send message</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#sendCategory").click(function() {
    var category = $("#recipient-name").val();
    var token = "{{csrf_token()}}";
    $.post(
        "{{asset('category')}}",
        {name: category, _token: token},
        function(result){
          $.notify("success", "success");
          location.reload();

        }
  );


  });
</script>
@endsection
