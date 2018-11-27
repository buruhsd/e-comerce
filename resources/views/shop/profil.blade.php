<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    		
	{{-- style --}}
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="stylesheet" href="{{ asset ('css/profil.css')}}">
	<link href='{{asset('logo/logo.jpg')}}' rel='shortcut icon'>
	@yield('styles')
</head>
<body>
    <div style="padding-left: 50px;padding-top: 30px;">
        <a href="{{ redirect()->back()->getTargetUrl() }}" style="text-decoration: none;color:white;"><i class="fas fa-arrow-left fa-2x"></i></a>
    </div>
<div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            @php
                                $image = $data[0]->imagePath;
                            @endphp
                            @if ($image == null)
                                <img src="{{asset('profil/noImage.jpg')}}" alt="No Image">
                            @else
                                <img src="{{asset('profil/'.$image)}}" alt=""/>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{$data[0]->user->name}}
                                    </h5>
                                    <h6>
                                        {{$data[0]->user->email}}
                                    </h6>
                                    <p class="proile-rating">SOLD : 
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach($prod as $d)
                                        @php
                                            $total ++;
                                        @endphp
                                        @endforeach
                                        {{$total}}
                                    <span></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="profile-edit-btn" data-toggle="modal" data-target="#myModalNorm">Edit Profil</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work" style="padding-left: 60px">
                            <div class="row">
                                @php
                                    $fa = $data[0]->facebook;
                                @endphp
                                @if ($fa == null)
                                    
                                @else
                                    <i class="fab fa-facebook-square fa-lg"><p><u><strong>{{$fa}}</strong></u></p></i>
                                @endif
                            </div>
                            <div class="row" style="padding-top: 5px">
                                @php
                                    $in = $data[0]->instagram;
                                @endphp
                                @if ($in == null)
                                    
                                @else
                                    <i class="fab fa-instagram fa-lg"><p><u><strong>{{$in}}</strong></u></p></i>
                                @endif
                            </div>
                            <div class="row" style="padding-top: 5px">
                                @php
                                    $we = $data[0]->website;
                                @endphp
                                @if ($we == null)
                                    
                                @else
                                    <i class="fab fa-chrome fa-lg"><p><u><strong>{{$we}}</strong></u></p></i>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            {{$data[0]->user->name}}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$data[0]->user->email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        @php
                                            $us = $data[0]->phone;
                                        @endphp
                                        @if ($us == null)
                                            <p>-</p>
                                        @else
                                            <p>{{$us}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Product</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$total}} product</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>       
        </div>
        <div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: left;">
                            Checkout
                        </h4>
                        <button type="button" class="close" 
                           data-dismiss="modal">
                               <span aria-hidden="true">&times;</span>
                               <span class="sr-only">Close</span>
                        </button>
                    </div>
                    
                    <!-- Modal Body -->
                    <div class="modal-body">
                        
                        <form role="form" action="{{route('postProfil')}}" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="form-group">
                            <label for="phone">Phone</label>
                            @php
                                $p = $data[0]->phone;
                            @endphp
                            @if ($p == null)
                                <input class="form-control" type="number" name="phone" placeholder="put nuber phone">
                            @else
                                <input class="form-control" type="number" name="phone" value="{{$p}}">
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="facebook">Facebook</label>
                            @php
                                $f = $data[0]->facebook;
                            @endphp
                            @if ($f == null)
                                <input class="form-control" name="facebook" placeholder="put facebook name">
                            @else
                                <input class="form-control" name="facebook" value="{{$f}}">
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="instagram">Instagram</label>
                            @php
                                $i = $data[0]->instagram;
                            @endphp
                            @if ($i == null)
                                <input class="form-control" name="instagram" placeholder="put instagram name">
                            @else
                                <input class="form-control" name="instagram" value="{{$i}}">
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="website">Website</label>
                            @php
                                $w = $data[0]->website;
                            @endphp
                            @if ($w == null)
                                <input class="form-control" name="website" placeholder="put web url">
                            @else
                                <input class="form-control" name="website" value="{{$w}}">
                            @endif
                          </div>
                          <div class="form-group">
                            @php
                                $image = $data[0]->imagePath;
                            @endphp
                            @if ($image == null)
                                <label for="img" style="color: red;">Select Your Profil Image</label>
                            @else
                                <img src="{{asset('profil/'.$image)}}" alt=""/>
                            @endif
                            <input type="file" name="img" style="padding-top: 10px">
                           </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cencel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
	{{-- script --}}
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="{{asset('scrolling-nav.js')}}"></script>
	<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>