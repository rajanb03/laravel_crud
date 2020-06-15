@extends('app')

@section('title','Read One Product')

@section('content')

<div class="container mt-2">			
		<div class="page-header">
			<h3> Read One Product </h3>
		</div>
		
		<a href="/products" class="btn btn-info float-right">
		<span class="fas fa-eye"></span>
		   Read Products</a>
		<br><br>

			<table class="table table-hover table-bordered">
				{{-- @foreach($data as $product) --}}
				<tr>
					<td>
						Name
					</td>
					<td>
						{{$data->name}}
					</td>
				</tr>
				<tr>
					<td>
						Description
					</td>
					<td>
						{{$data->description}}				
					</td>
				</tr>
				<tr>
					<td>
						Price
					</td>
					<td>
						{{$data->price}}
					</td>
				</tr>
				<tr>
					<td>
						Category
					</td>
					<td>
						 {{$data->category}}
					</td>
				</tr>
				{{-- @endforeach --}}
			</table>
		</form>
</div>
@endsection