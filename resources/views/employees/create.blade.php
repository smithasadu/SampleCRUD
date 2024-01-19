@extends('layouts.app')
@section('title', 'Employees')
@section('content')
	<div class="container">
		<div class="card col-6 offset-3">
		  <div class="card-header">
		    Add Employee
		  </div>
		  <div class="card-body">
		  	@include('messages')
		    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
		     	@csrf
		     	<div class="mb-3">
				  	<label for="employeeFormControlCompanyname" class="form-label">Company</label>
				  	<select id="company_id" name="company_id" class="form-control">
	                    <option value="" disabled selected>Select a company</option>
	                    @foreach ($companies as $company)
	                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->companyname }}</option>
	                    @endforeach
	                </select>
				  	@error('company_id')
					  	<span class="text-danger">
					  		<strong>{{$message}}</strong>
					  	</span>
				  	@enderror
				</div>
				<div class="mb-3">
				  <label for="employeeFormControlFirstname" class="form-label">First Name</label>
				  <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{old('firstname')}}" id="firstname">
				  @error('firstname')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
		     	<div class="mb-3">
				  <label for="employeeFormControlLastname" class="form-label">Last Name</label>
				  <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{old('lastname')}}" >
				  @error('lastname')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
				<div class="mb-3">
				  <label for="exampleFormControlEmail" class="form-label">Email</label>
				  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="name@example.com" value="{{old('email')}}">
				  @error('email')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
				<div class="mb-3">
				  <label for="exampleFormControlPhone" class="form-label">Phone No</label>
				  <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" >
				  @error('phone')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
				<div class="mb-3">
				 	<button type="submit" class="btn btn-primary">Save Employee</button>
				 </div>
		    </form>
		  </div>
		</div>
	</div>
@endsection