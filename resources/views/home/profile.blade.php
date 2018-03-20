@extends('layouts.app')

@section('content')

        <div id="all-output" class="col-md-10 upload">
        	<div id="upload">
                <div class="row">


					<div class="col-md-12">
						<h1 class="page-title"><span>Update </span> Profile</h1>
						<form action="{{ url( '/profile' ) }}"  method="post">
							@csrf
					    	<div class="row">
					        	<div class="col-md-12">
					            	<label>Email</label>
					                <input 
					                	type="text" 
					                	class="form-control"
					                	readonly="true" value="{{ auth()->user()->email }}">
					            </div>
					        	<div class="col-md-12">
					            	<label>Username</label>
					                <input 
					                	type="text" 
					                	class="form-control"
					                	readonly="true" value="{{ auth()->user()->username }}">
					            </div>
					        	<div class="col-md-12">
					            	<label>Name</label>
					                <input 
					                	type="text" 
					                	class="form-control"
					                	name="name" value="{{ auth()->user()->name }}">
					            </div>
					        	<div class="col-md-12">
					            	<label>Surname</label>
					                <input 
					                	type="text" 
					                	class="form-control"
					                	name="surname" value="{{ auth()->user()->surname }}">
					            </div>
					        	<div class="col-md-12">
					                <button type="submit" class="btn btn-dm">Update</button>
					            </div>
					        </div>
					    </form>
					</div>

				</div>
			</div>
		</div>

@endsection
