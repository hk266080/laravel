@extends('frontlayout')
@section('content')
<div class="container my-4">
	<h3 class="mb-3">{{$services->title}}</h3>
	<img  src="{{asset('storage/app/'.$services->photo)}}" />
	<p>{{$services->small_desc}}</p>
</div>
@endsection