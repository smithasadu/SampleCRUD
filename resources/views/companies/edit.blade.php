@extends('layouts.app')
@section('title', 'Companies')
@section('content')
	<div class="container">
		<div class="card col-6 offset-3">
		  <div class="card-header">
		   	Edit Company
		  </div>
		  <div class="card-body">
		  	@include('messages')
		  	<form method="POST" action="{{ route('companies.update', ['company' => $company->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
		     	<div class="mb-3">
				  <label for="companyFormControlName" class="form-label">Company Name</label>
				  <input type="text" name="companyname" class="form-control @error('companyname') is-invalid @enderror" value="{{old('companyname', $company->companyname)}}" id="companyname">
				  @error('companyname')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
		     	<div class="mb-3">
				  <label for="companyFormControlEmail" class="form-label">Email</label>
				  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="name@example.com" value="{{old('email', $company->email)}}">
				  @error('email')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
				<div class="mb-3">
				  <label for="companyFormControlWebsite" class="form-label">Website</label>
				  <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" value="{{old('website', $company->website)}}" id="website" rows="3">
				  @error('website')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
				<div class="mb-3">
				  <label for="companyFormControlLogo" class="form-label">Logo</label>
				  <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{old('logo', $company->logo)}}" id="logo" rows="3" accept="image/*">
				  	@if ($company->logo)
	                    <p>{{ $company->logo }}</p>
	                    <!-- You can display a link to download the file, or just show the file name -->
	                    {{-- <a href="{{ asset('storage/' . $company->logo) }}" target="_blank">Download File</a> --}}
	                @else
	                    <p>No file uploaded.</p>
	                @endif
				  @error('logo')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
				<div class="mb-3">
				 	<button type="submit" class="btn btn-primary">Update Company</button>
				 </div>
		    </form>
		  </div>
		</div>
	</div>
@endsection