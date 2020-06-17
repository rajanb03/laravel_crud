@extends('app')

@section('title','Edit Category')

@section('content')

<div class="container mt-2">			
		<div class="page-header">
			<h3> Edit Category </h3>
		</div>
		
		<a href="/api/category" class="btn btn-info float-right">
		<span class="fas fa-eye"></span>
		   Read Category</a>
		<br><br>

		<form action="/api/category/{{$data->id}}" method="post" class="form-group">
			@method('PUT')
			@csrf
			<table class="table table-hover table-bordered">
				<tr>
					<td>
						Name
					</td>
					<td>
						<input type="text" name="name" value="{{$data->name}}" class="form-control">				
					</td>
				</tr>
				<tr>
					<td>
						Description
					</td>
					<td>
						<textarea class="form-control" name="description">
							{{$data->description}}
						</textarea>
					</td>
				</tr>
				<tr>
					<td>

					</td>
					<td>
						<button type="submit" name="btnSave" class="btn btn-success">
							<span class="fas fa-check-circle"></span> Update
						</button>
					</td>
				</tr>
			</table>
		</form>
</div>
@endsection