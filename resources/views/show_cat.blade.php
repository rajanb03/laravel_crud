@extends('app')

@section('title','Read Categories')

@section('content')

	<div class="container">

		<div class="page-header">
			<h3> Read Categories </h3>
		</div>
		
		<a href="/api/category/create" class="btn btn-info float-right">
			<span class="fas fa-plus-circle">
			</span> 
			 Create Categories
		</a>
		<br><br>

		<table class='table table-hover table-bordered'>
	        <tr>
	            <th>No.</th>
	            <th>Category</th>
	            <th>Actions</th>
	        </tr>
	        @forelse($data as $cat)
	        {{-- @foreach($data as $cat) --}}
		        <tr>
		        	<td>
		        		{{$loop->index+1}}
		        	</td>
		            <td>
		            	{{$cat->name}}
		            </td>
		            <td>
		                <form action="/api/category/{{$cat->id}}" method="post">
	                		@csrf
	                		@method('DELETE')
			             	<a href="/api/category/{{$cat->id}}" class="btn btn-primary left-margin">
			                    <span class="fas fa-list"></span> Read
			                </a>
			                <a href="/api/category/{{$cat->id}}/edit" class="btn btn-info left-margin">
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
	      		<td colspan="3" class="text-center">
	      			<span class="text-gray-dark text-l">No Categories Available. . .</span>
	      		</td>
	      	</tr>
	      	@endforelse
    	</table>
	</div>

@endsection