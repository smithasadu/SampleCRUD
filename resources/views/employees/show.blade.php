@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="card col-6 offset-3">
			<div class="card-header">
				<h2>Employee Details</h2>
		  	</div>
		  	<div class="card-body">		    
		        <ul>
		            <li><strong>Company Name : </strong>{{$employee->company->companyname}}</li>
		            <li><strong>First Name : </strong>{{$employee->firstname}}</li>
		            <li><strong>Last Name : </strong>{{$employee->lastname}}</li>
		            <li><strong>Email : </strong>{{$employee->email}}</li>
		            <li><strong>Phone : </strong>{{$employee->phone}}</li>		            
		        </ul>
		  	</div>
		</div>
	</div>
@endsection