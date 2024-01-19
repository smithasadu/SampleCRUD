@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card col-6 offset-3">
			<div class="card-header">
				<h2>Company Details</h2>
		  	</div>
		  	<div class="card-body">		    
		        <ul>
		            <li><strong>Name : </strong>{{$company->companyname}}</li>
		            <li><strong>Email : </strong>{{$company->email}}</li>
		            <li><strong>Website:</strong> <a href="http://{{$company->website}}" target="_blank">{{$company->website}}</a></li>
		            <li><strong>Logo:</strong> <img src="{{asset('storage/'.$company->logo)}}" alt="{{$company->companyname}}" style="max-width: 200px;"></li>
		        </ul>
		  	</div>
		</div>
	</div>
@endsection