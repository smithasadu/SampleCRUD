@extends('layouts.app')
@section('title', 'Companies')
@section('content')
	<div class="container">
		<div class="card col-6 offset-3">
		  <div class="card-header">
		    Add Company
		  </div>
		  <div class="card-body">
		  	@include('messages')
		    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
		     	@csrf
		     	<div class="mb-3">
				  <label for="companyFormControlName" class="form-label">Company Name</label>
				  <input type="text" name="companyname" class="form-control @error('companyname') is-invalid @enderror" value="{{old('companyname')}}" id="companyname">
				  @error('companyname')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
		     	<div class="mb-3">
				  <label for="companyFormControlEmail" class="form-label">Email</label>
				  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="name@example.com">
				  @error('email')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
				<div class="mb-3">
				  <label for="companyFormControlWebsite" class="form-label">Website</label>
				  <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" value="{{old('website')}}" id="website" rows="3">
				  @error('website')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
				<div class="mb-3">
				  <label for="companyFormControlLogo" class="form-label">Logo</label>
				  <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{old('logo')}}" id="logo" rows="3" accept="image/*">
				  @error('logo')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
				<div class="mb-3">
				 	<button type="submit" class="btn btn-primary">Save Company</button>
				 </div>
		    </form>
		  </div>
		</div>
	</div>
@endsection