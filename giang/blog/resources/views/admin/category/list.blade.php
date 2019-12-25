@extends('layouts.app')

@section('content')
<div class="container">
	<p>Category management</p>



	<a class="btn btn-primary" href="category/create">Add</a>
	<p></p>
	<table class="table">
		<th>
			<td>ID</td>
			<td>Name</td>
			<td>View</td>
			<td>Update</td>
			<td>Delete</td>
		</th>
	</table>
</div>

@endsection







