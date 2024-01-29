@extends('layouts.app')
@section('content')
        <!--banner圖片  startr-->
        <div class="container-fluid">
            <div id="carouselExampleIndicators" class="carousel slide pointer-event" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img src="{{asset('images/banner.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item active">
                        <img src="{{asset('images/banner.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('images/banner.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach($plates as $plate)
                        <div class="col-sm-4">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset("storage/uploads/images/".$plate->image_url)}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$plate->name}}</h5>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
@endsection
