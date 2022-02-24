@extends('frontlayout')
@section('content')
<!-- Slider Section -->
<div class="container-fluid main-section">
<div class="row">
<div class="offset-lg-2 col-lg-8 section-part text-center">
<h1>Your Rooms</h1>
<P>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore eta. Ut enim ad minim veniam,
quis nostrud exercgiat nulla deserunt mollit anim id est laborum.</P>
</div>
</div>
<i class="fa fa-angle-double-down blink" aria-hidden="true"></i>
</div>
	<!-- Slider Section End -->
	<!-- Service Section Start -->
		
	<div class="container my-4">

		<h1 class="text-center border-bottom" id="services">Services</h1>
		@foreach($services as $service)
		<div class="row my-4">
			<div class="col-md-3">
				<img class="img-fluid" width="250px" src="{{asset('storage/app/'.$service->photo)}}" />
			</div>
			<div class="col-md-8">
				<h3>{{$service->title}}</h3>
				<p>{{$service->small_desc}}</p>
				<p>
					<a href="{{url('service/'.$service->id)}}" class="btn btn-primary">Read More</a>
				</p>
			</div>
		</div>
		@endforeach
	</div>

	<!-- Service Section End -->
	<!-- Gallery Section Start -->
	<div class="container my-4">
		<h1 class="text-center border-bottom" id="gallery">Gallery</h1>
		<div class="row my-4">
			@foreach($roomTypes as $rtype)
			<div class="col-md-3">
				<div class="card">
					<h5 class="card-header">{{$rtype->title}}</h5>
					<div class="card-body">
						@foreach($rtype->roomtypeimgs as $index => $img)
                        	<a href="{{asset('storage/app/'.$img->img_src)}}" data-lightbox="rgallery{{$rtype->id}}">
                        		@if($index > 0)
                        		<img class="img-fluid hide" src="{{asset('storage/app/'.$img->img_src)}}" />
                        		@else
                        		<img class="img-fluid" src="{{asset('storage/app/'.$img->img_src)}}" />
                        		@endif
                        	</a>
                        </td>
                        @endforeach
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<!-- Gallery Section End -->
	<!-- Slider Section Start -->
	<h1 class="text-center mt-5" id="gallery">Testimonials</h1>
	<div id="testimonials" class="carousel slide p-5 bg-secondary text-white border mb-5" data-bs-ride="carousel">
	  <div class="carousel-inner">
	  	@foreach($testimonials as $index => $testi)
	    <div class="carousel-item @if($index==0) active @endif">
	      	<figure class="text-center">
			  <blockquote class="blockquote">
			    <p>{{$testi->testi_cont}}</p>
			  </blockquote>
			  <figcaption class="blockquote-footer text-white">
			    {{$testi->customer->full_name}}
			  </figcaption>
			</figure>
	    </div>
	    @endforeach
	  </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#testimonials" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#testimonials" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Next</span>
	  </button>
	</div>
	<!-- Slider Section End -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor')}}/lightbox2-2.11.3/dist/css/lightbox.min.css" />
<script type="text/javascript" src="{{asset('public/vendor')}}/lightbox2-2.11.3/dist/js/lightbox.min.js"></script>
<style type="text/css">
	.hide{
		display: none;
	}
	.main-section{
position: relative;
background:linear-gradient(rgba(0, 0, 0, .7), rgba(235, 82, 73, .7), rgba(0, 0, 0, .7)), url("https://i.ibb.co/ZGDTdBY/danial-igdery-FCHl-Yv-R5g-JI-unsplash.jpg");
height:500px;
background-size: cover;
}

.main-section i{
font-size:35px;
color:#fff;
position:absolute;
left:50%;
bottom:15px;
transform: translateX(-50%);
}
.main-section .section-part{
color:#fff;
position: absolute;
top: 50%;
transform: translateY(-50%);
}
@-webkit-keyframes blinker {
from {opacity: 1.0;}
to {opacity: 0.0;}
}
.blink{
text-decoration: blink;
-webkit-animation-name: blinker;
-webkit-animation-duration: 0.6s;
-webkit-animation-iteration-count:infinite;
-webkit-animation-timing-function:ease-in-out;
-webkit-animation-direction: alternate;
}
</style>

@endsection