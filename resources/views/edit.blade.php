@extends('app')

@section('title','Edit Products')

@section('content')

<div class="container mt-2">			
		<div class="page-header">
			<h3> Edit Products </h3>
		</div>
		
		<a href="/products" class="btn btn-info float-right">
		<span class="fas fa-eye"></span>
		   Read Products</a>
		<br><br>


		<form action="/products/{{$data->id}}" method="post" class="form-group">
			@csrf
			@method('PUT')
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
						Price
					</td>
					<td>
						<input type="text" name="price" value="{{$data->price}}" class="form-control">				
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
						Category
					</td>
					<td>
						 <select class="form-control category" name="category">
						 	<option style="display: none;">
						 		{{$data->category}}
						 	</option>
		                    	@php($cats = App\Category::all())
                        		@foreach($cats as $cat)
									<option>
	                        		  		{{$cat->name}}
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
							<span class="fas fa-check-circle"></span> Update
						</button>
					</td>
				</tr>
			</table>
		</form>
</div>
@endsection