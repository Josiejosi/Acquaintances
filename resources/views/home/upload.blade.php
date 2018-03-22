@extends('layouts.app')

@section('content')

        <div id="all-output" class="col-md-10 upload">
        	<div id="upload">
                <div class="row">

					<div class="col-md-8">
						<h1 class="page-title"><span>Upload</span> Video</h1>

						@if(count($errors) > 0)
						    <div class="alert alert-info">
						        <ul>
						            @foreach($errors->all() as $error)
						               <li> {{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif

						<form action="{{ url( '/upload' ) }}"  method="post" enctype="multipart/form-data">
							@csrf
					    	<div class="row">
					        	<div class="col-md-12">
					            	<label>Post Title</label>
					                <input 
					                	type="text" 
					                	name="title"
					                	class="form-control" 
					                	placeholder="Post Title">
					            </div>
					        	<div class="col-md-12">
					            	<label>Video Length</label>
					                <input 
					                	type="text" 
					                	name="video_length"
					                	class="form-control" 
					                	placeholder="Length">
					            </div>

					        	<div class="col-md-12">
					            	<label>Post Category</label>
					                <select 
					                	name="category" 
					                	class="form-control" 
					                	placeholder="Post Category">
										<option>Please select</option>

										@if( count( $categories ) > 0 )

											@foreach( $categories as $category )
												<option value="{{ $category->id }}">{{ $category->name }}</option>
											@endforeach

										@endif

					                </select>
					            </div>

					        	<div class="col-md-12">
					            	<label>Video Type</label>
					                <select 
					                	name="is_file_video" 
					                	class="form-control" 
					                	onchange="check_video_type(this.value)" 
					                	placeholder="Video Type">
										<option>Please select</option>
										<option value="1">Youtube video</option>
										<option value="2">Disk Video</option>

					                </select>
					            </div>

					        	<div class="col-md-12" id="disk_vid">

					            	<label>Video upload</label>
					                <input 
					                	type="file" 
					                	name="video_file" 
					                	class="file form-control">

					            </div>

					        	<div class="col-md-12" id="tube_vid">

					            	<label>Video upload</label>
					                <input 
					                	type="text" 
					                	name="video_file" 
					                	class="file form-control">

					            </div>

					        	<div class="col-md-12">
					            	<label>Post Excerpt</label>
					                <textarea 
					                	name="description"
					                	class="form-control" 
					                	rows="4" 
					                	placeholder="COMMENT"></textarea>
					            </div>
					        	<div class="col-md-6 col-md-offset-3">
					                <button type="submit" class="btn btn-dm">Save your post</button>
					            </div>
					        </div>
					    </form>
					</div>

				</div>
			</div>
		</div>

@endsection

@section('js')

	<script>
		$("#tube_vid").hide() ;
		$("#disk_vid").hide() ;
		function check_video_type(options) {

			if ( options == 2 ) {

				$("#tube_vid").hide() ;
				$("#disk_vid").show() ;

			} else if (options == 1 ) {

				$("#tube_vid").show() ;
				$("#disk_vid").hide() ;

			}

		}
	</script>

@endsection
