@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
<div class="row no-gutters">
  <div class="col-6 col-md-3">.col-6 .col-md-4</div>
  <div class="col-12 col-sm-6 col-md-9">
  		<div class="row">
  			@foreach($products as $p)
				<div class="card m-1" style="width: 15rem;">
				  <img class="card-img-top" src="{{ $p->imagePath }}/100px180/" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title">{{ $p->title }}</h5>
				    <div class="row">
					    <div class="col">
					      	<div align="left">
					    		<p class="card-text"><strong> ${{ $p->price }} </strong></p>
					    	</div>
					    </div>
					    <div class="col">
						    <div align="right">
						    	<a href="{{ route ('product.getAddToCart', ['id' => $p->id])}}" class="btn btn-primary">Add Cart</a>
						    </div>
					    </div>
				    </div>
				  </div>
				</div>
			@endforeach
		</div>
  </div>
</div>
@endsection