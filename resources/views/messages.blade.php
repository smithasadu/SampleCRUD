@if($message=Session::get('message'))
	<div class="alert @if($alert=Session::get('alert-class')) {{$alert}} @endif alert-block">
		<strong>{{$message}}</strong>
	</div>
@endif