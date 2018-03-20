@extends('layouts.app')

@section('content')

        <div id="all-output" class="col-md-10 upload">
        	<div id="upload">
                <div class="row">

                	<div class="col-md-8">
						<h1 class="page-title"><span>All</span> Users</h1>

						@if( count( $bulder ) > 0 )

							<table class="table">

								@foreach( $bulder as $user )
									<tr>
										<td>{{ $user->email }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ $user->surname }}</td>
										<td class="text-center">
											<a class="btn btn-xs btn-danger" href="{{ url( '/user/delete/' ) }}/{{ $user->id }}">
												<i class="fa fa-trash-o"></i>
											</a>
											<a class="btn btn-xs btn-warning" href="{{ url( '/user/block/' ) }}/{{ $user->id }}">
												<i class="fa fa-square-o"></i>
											</a>
										</td>
									</tr>
								@endforeach

							</table>

						@else
							<p>No users found</p>
						@endif
                	</div>

					<div class="col-md-4">
						<h1 class="page-title"><span>Create</span> Admin User</h1>
						<form action="{{ url( '/user' ) }}"  method="post">
							@csrf
					    	<div class="row">
					        	<div class="col-md-12">
					            	<label>Email</label>
					                <input type="text" class="form-control" name="email" placeholder="Email">
					            </div>
					        	<div class="col-md-12">
					            	<label>Name</label>
					                <input type="text" class="form-control" name="name" placeholder="Name">
					            </div>
					        	<div class="col-md-12">
					            	<label>Surname</label>
					                <input type="text" class="form-control" name="surname" placeholder="Surname">
					            </div>
					        	<div class="col-md-12">
					            	<label>Password</label>
					                <input type="password" class="form-control" name="password" placeholder="Password">
					            </div>
					        	<div class="col-md-12">
					            	<label>Confirm Password</label>
					                <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
					            </div>
					        	<div class="col-md-12">
					                <button type="submit" class="btn btn-dm">Save new admin</button>
					            </div>
					        </div>
					    </form>
					</div>

				</div>
			</div>
		</div>

@endsection
