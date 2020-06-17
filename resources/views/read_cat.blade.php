@extends('app')

@section('title','Read One Category')

@section('content')

<div class="container mt-2">			
		<div class="page-header">
			<h3> Read One Category </h3>
		</div>
		
		<a href="/api/category" class="btn btn-info float-right">
		<span class="fas fa-eye"></span>
		   Read Categories</a>
		<br><br>

			<table class="table table-hover table-bordered">
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
				
			</table>
		</form>
</div>
@endsection