@extends('layouts.app')
@section('title', 'Employees')
@section('content')
	<div class="container">
		<div class="card col-6 offset-3">
		  <div class="card-header">
		    Edit Employee
		  </div>
		  <div class="card-body">
		  	@include('messages')
		   <form method="POST" action="{{ route('employees.update', ['employee' => $employee->id]) }}">
                @csrf
                @method('PUT')
		     	<div class="mb-3">
				  	<label for="employeeFormControlCompanyname" class="form-label">Company Name</label>
				  	<select id="company_id" name="company_id" class="form-control">
	                    <option value="" disabled selected>Select a company</option>
	                     @foreach ($companies as $company)
			                <option value="{{ $company->id }}" {{ (old('company_id', $employee->company_id) == $company->id) ? 'selected' : '' }}>
			                    {{ $company->companyname }}
			                </option>
			            @endforeach
	                </select>
				  	@error('companyname')
					  	<span class="text-danger">
					  		<strong>{{$message}}</strong>
					  	</span>
				  	@enderror
				</div>
				<div class="mb-3">
				  <label for="employeeFormControlFirstname" class="form-label">First Name</label>
				  <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{old('firstname',$employee->firstname)}}" id="firstname">
				  @error('firstname')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
		     	<div class="mb-3">
				  <label for="employeeFormControlLastname" class="form-label">Last Name</label>
				  <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{old('lastname',$employee->lastname)}}" >
				  @error('lastname')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
				<div class="mb-3">
				  <label for="exampleFormControlEmail" class="form-label">Email</label>
				  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="name@example.com" value="{{old('email',$employee->email)}}">
				  @error('email')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
				<div class="mb-3">
				  <label for="exampleFormControlPhone" class="form-label">Phone No</label>
				  <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone',$employee->phone)}}" >
				  @error('phone')
				  	<span class="text-danger">
				  		<strong>{{$message}}</strong>
				  	</span>
				  @enderror
				</div>
				<div class="mb-3">
				 	<button type="submit" class="btn btn-primary">Update Employee</button>
				 </div>
		    </form>
		  </div>
		</div>
	</div>
@endsection