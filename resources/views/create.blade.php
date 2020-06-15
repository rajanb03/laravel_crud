@extends('app')

@section('title','Create Products')

@section('content')

<div class="container mt-2">			
		<div class="page-header">
			<h3> Create Products </h3>
		</div>
		
		<a href="/products" class="btn btn-info float-right">
		<span class="fas fa-eye"></span>
		   Read Products</a>
		<br><br>


		<form action="/products" method="post" class="form-group">
			@csrf
			<table class="table table-hover table-bordered">
				<tr>
					<td>
						Name
					</td>
					<td>
						<input type="text" name="name" class="form-control">				
					</td>
				</tr>
				<tr>
					<td>
						Description
					</td>
					<td>
						<textarea class="form-control" name="description">
							
						</textarea>
				
					</td>
				</tr>
				<tr>
					<td>
						Price
					</td>
					<td>
						<input type="text" name="price" class="form-control">
				
					</td>
				</tr>
				<tr>
					<td>
						Category
					</td>
					<td>
						 <select class="form-control category" name="category">
						 	@foreach($data as $category)
						 		<option>
						 			{{$category->name}}
						 		</option>
						 	@endforeach
						 	
						 </select>
					</td>
				</tr>
				<tr>
					<td>

					</td>
					<td>
						<button type="submit" name="btnSave" class="btn btn-success">
						<span class="fas fa-check-circle"></span> Save
						</button>
					</td>
				</tr>
			</table>
		</form>
</div>
@endsection