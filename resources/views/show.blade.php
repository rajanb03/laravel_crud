@extends('app')

@section('title','Read Products')

@section('content')

	<div class="container">
		<div class="page-header">
			<h3 class="float-left"> Read Products </h3>
			
			<a href="/api/products/create" class="btn btn-info float-right">
					<span class="fas fa-plus-circle"></span> 
					Create Products
				</a>
		<br><br><br><br>
		</div>

		<form class="input-group mb-2 col-sm-9 float-left" action="/api/products/search" method="post">
		@csrf
			 <input type="text" class="form-control col-3" placeholder="Product Name" aria-label="Product Name" name="search" aria-describedby="basic-addon2">
			 
			 <div class="input-group-append">
			    <button class="btn btn-sm btn-info" type="submit">
			    	<span class="fas fa-search"></span>
			    </button>
			 </div>
		</form>

		<form class="float-right" action="/api/products/export" method="post">
		@csrf
			    <button class="btn btn-secondary" name="exportexcel" type="submit">
			    	<span class="fas fa-file-excel-o"></span>
			    	  Export Excel
			    </button>
		</form>
{{-- 
		<div>
			<a href="/products/export" name="exportexcel" class="btn btn-secondary float-right">
				<i class="fa fa-file-excel-o"></i>
				 Export Excel
			</a>
		</div> --}}
		{{-- <div>	
			<a href="/products/export" name="exportexcel" class="btn btn-danger ">
				<i class="fa fa-file-pdf-o"></i>
				 Export PDF
			</a>
		</div> --}}
		
		<table class='table table-hover table-bordered'>
	        <tr>
	        	<th>No.</th>
	            <th>Product</th>
	            <th>Price</th>
	            <th>Category</th>
	            <th>Actions</th>
	        </tr>
	        	@forelse($data as $product)
			        <tr>
			        	<td>
			        		{{$loop->index+1}}
			        	</td>
			            <td>
			            	{{$product->name}}
			            </td>
			            <td>
			            	{{$product->price}}
			            </td>
			            <td>
			            	{{$product->category}}
			            </td>
			            <td>
			            	<form action="/api/products/{{$product->id}}" method="post">
		                		@csrf
		                		@method('DELETE')
				             	<a href="/api/products/{{$product->id}}" class="btn btn-success left-margin">
				                    <span class="fas fa-list"></span> Read
				                </a>
				                <a href="/api/products/{{$product->id}}/edit" class="btn btn-info left-margin">
				                	<span class="fas fa-edit"></span> Edit
				                </a>
				                <button class="btn btn-danger" onclick="return confirm('Are You Sure ?')">
				                    <span class="fas fa-trash"></span> Delete
				                </button>
			                </form>
			            </td>
			        </tr>
			    @empty
			    	<tr>
		      		<td colspan="5" class="text-center">
		      			<span class="text-gray-dark text-l">No Products Available. . .</span>
		      		</td>
		      	</tr>
		    @endforelse
    	</table>
    	<br>
	        {{ $data->links() }}
	</div>

@endsection