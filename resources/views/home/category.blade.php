@extends('layouts.app')

@section('content')

        <div id="all-output" class="col-md-10 upload">
        	<div id="upload">
                <div class="row">

                	<div class="col-md-8">
						<h1 class="page-title"><span>All</span> Categories</h1>

						@if( count( $categories ) > 0 )

							<table class="table">

								@foreach( $categories as $category )
									<tr>
										<td>{{ $category->name }}</td>
										<td>{{ $category->description }}</td>
										<td class="text-center">
											<a class="btn btn-xs btn-danger" href="{{ url( '/category/delete/' ) }}/{{ $category->id }}">
												<i class="fa fa-trash-o"></i>
											</a>
										</td>
									</tr>
								@endforeach

							</table>

						@else
							<p>No categories found</p>
						@endif
                	</div>

					<div class="col-md-4">
						<h1 class="page-title"><span>Create</span> New Category</h1>
						<form action="{{ url( '/category' ) }}"  method="post">
							@csrf
					    	<div class="row">
					        	<div class="col-md-12">
					            	<label>Category</label>
					                <input type="text" class="form-control" name="name" placeholder="Name">
					            </div>
					        	<div class="col-md-12">
					            	<label>Description</label>
					                <textarea class="form-control" rows="4" name="description" placeholder="Description"></textarea>
					            </div>
					        	<div class="col-md-12">
					                <button type="submit" class="btn btn-dm">Save your category</button>
					            </div>
					        </div>
					    </form>
					</div>

				</div>
			</div>
		</div>

@endsection
