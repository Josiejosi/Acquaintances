@extends('layouts.app')

@section('content')

    <div id="all-output" class="col-md-12 upload">

    	<div id="upload">

            <div class="row">


				<div class="col-md-12">

					<h1 class="page-title"><span>Registration Duration </span> Report</h1>

					<p class="pull-right">
						<a href="{{ url( 'pdf/registration_period' ) }}" target="_blank" class="btn btn-xs btn-danger">
							<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export PDF
						</a>
					</p>

				    <div class="panel panel-info">

				        <div class="panel-heading">

				            <i class="fa fa-line-chart" aria-hidden="true"></i> &nbsp; How many videos per user

				        </div>

				        <div class="panel-body">  


				            <div class="table-responsive">

				                <table class="table table-hover table-striped table-bordered">

				                	<thead>
				                        <tr>
				                        	<td>Username</td>
				                            <td>User(s) names</td>
				                            <td>Registered Period</td>
				                        </tr>		
				                	</thead>

				                    <tbody>
										
										@if ( count( $bulder["users"] ) > 0  )

										@foreach( $bulder["users"] as $user )

				                        <tr>
				                            <td>{{ $user->username }}</td>
				                            <td>{{ $user->name }} {{ $user->surname }}</td>
				                            <td>{{ $user->created_at->diffForHumans() }}</td>
				                        </tr>

				                        @endforeach

				                        @else

				                        <tr>
				                            <td colspan="2" class="text-center">No Statistics found</td>
				                        </tr>

				                        @endif

				                    </tbody>

				                </table>

				            </div>

				        </div>

				    </div>

				</div>

			</div>

		</div>
		
	</div>

@endsection
