@extends('layouts.app')

@section('content')

        <div id="all-output" class="col-md-10 upload">
        	<div id="upload">
                <div class="row">

                	<div class="col-md-12">
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

				</div>
			</div>
		</div>

@endsection
