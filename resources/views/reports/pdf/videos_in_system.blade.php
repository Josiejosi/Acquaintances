@extends('layouts.reports')

@section('content')

    <div id="all-output" class="col-md-12 upload">

    	<div id="upload">

            <div class="row">


				<div class="col-md-12">

					<h1 class="page-title"><span>Video </span> Report</h1>

				    <div class="panel panel-info">

				        <div class="panel-heading">

				            <i class="fa fa-line-chart" aria-hidden="true"></i> &nbsp; Videos in the system

				        </div>

				        <div class="panel-body">  

							<div class="row">
								
								<div class="col-md-4">
									<div class="thumbnail">
										<h2 class="text-center">{{ $bulder["min"] }}</h2>
										<p class="text-center">Minimum Daily Video Uploads</p>
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="thumbnail">
										<h2 class="text-center">{{ $bulder["max"] }}</h2>
										<p class="text-center">Maximum Daily Video Uploads</p>
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="thumbnail">
										<h2 class="text-center">{{ $bulder["avg"] }}</h2>
										<p class="text-center">Average Daily Video Uploads</p>
									</div>
								</div>

							</div>


				            <div class="table-responsive">

				                <table class="table table-hover table-striped table-bordered">

				                    <tbody>
										
										@if ( count( $bulder["data_dates"] ) > 0  )

										@foreach( $bulder["data_dates"] as $dates => $counts )

				                        <tr>
				                            <td>{{ $dates }}</td>
				                            <td>{{ $counts["data_count"] }}</td>
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
