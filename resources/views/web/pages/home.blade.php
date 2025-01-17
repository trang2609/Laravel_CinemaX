@extends('web.layout.index')
@section('css')

@endsection
@section('content')
<style>
        .carousel-inner {
            margin-top: 80px; 
        }

        .carousel-control-prev, 
        .carousel-control-next {
            background-color: #72be43;
            border-radius: 50%;
            width: 40px;  
            height: 40px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            top: 50%;
            transform: translateY(-50%); 
            position: absolute; 
        }

        .carousel-control-prev {
            left: 50px; 
        }

        .carousel-control-next {
            right: 50px;
        }

        .carousel-control-prev-icon, 
        .carousel-control-next-icon {
            width: 20px; 
            height: 20px; 
        }

        .carousel-control-prev:hover, 
        .carousel-control-next:hover {
            background-color: #66a839; 
        }

        .nav-tabs .nav-link {
        color: #72be43;
        border: 1px solid #72be43;
        font-weight: bold;
        border-radius: 0.25rem;
        }

        .nav-tabs .nav-link.active {
            background-color: #72be43;
            color: #ffffff;
        }

        .card {
        border: 1px solid #72be43;
        border-radius: 0.5rem;
        background-color: #ffffff;
        color: #72be43;
        }

        .card-body {
        background-color: #ffffff; 
        }

        .card a {
            color: #72be43;
        }

        .card-title {
            color: #72be43;
            font-weight: bold;
        }

        .card-text {
            color: #000000;
        }

        .card .badge {
            color: #ffffff;
        }

        .btn-outline-green {
        color: #72be43; 
        border-color: #72be43; 
        }
        .btn-outline-green:hover {
            background-color: #72be43; 
            color: white;
        }
        .page-heading {
        color: #72be43;
        }
</style>

<section class="container-lg clearfix">
    <!-- Slider -->
    <div id="carouselExampleControls1" class="carousel slide shadow" data-bs-ride="carousel">
    <div id="carouselExampleControls" class="carousel slide shadow" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($banners as $banner)
            <div class="carousel-item @if($loop->first) active @endif">
                @if(strstr($banner->image,"https") == "")
                <img src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $banner['image'] !!}.jpg" class="d-block w-100" style="max-height: 600px; object-fit: contain; object-position: 50% 100%" alt="...">
                @else
                <img src="{{ $banner->image }}" class="d-block w-100" style="max-height: 600px; object-fit: contain; object-position: 50% 100%" alt="...">
                @endif
            </div>
            @endforeach
        </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    <!--end slider -->

    <!-- Main content -->
    <div class="mt-5" id="mainContent">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="h5 nav-link active" href="#phimmoi" aria-controls="phimmoi" aria-expanded="true" data-bs-toggle="collapse" data-bs-target="#phimmoi">
                    Phim mới
                </a>
            </li>
            <li class="nav-item">
                <a class="h5 nav-link link-secondary" href="#vebantruoc" aria-controls="vebantruoc" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#vebantruoc">Vé bán trước</a>
            </li>
        </ul>

        <div id="vebantruoc" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse" data-bs-parent="#mainContent">
            @foreach($moviesEarly as $movie)
            <!-- Movie -->
            <div class="card-col">
                <article class="card px-0 overflow-hidden" style="background: #f5f5f5; ">
                    <div class="row g-0">
                        <div class="col-lg-4 col-12">
                            <a href="/movie/{{ $movie->id }}">
                                @if(strstr($movie->image,"https") == "")
                                <img src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $movie['image'] !!}.jpg" class="img-fluid rounded" style="width: 210px; height: 280px" alt="...">
                                @else
                                <img src="{{ $movie->image }}" class="img-fluid rounded" style="width: 210px; height: 280px" alt="...">
                                @endif
                            </a>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="card-body">
                                <a href="movie/{{ $movie->id }}" class="link link-dark text-decoration-none">
                                    <h5 class="card-title">{{ $movie->name }}</h5>
                                    <p class="card-text text-danger">{{ $movie->showTime }} phút</p>
                                    <p class="card-text">
                                        @foreach($movie->movieGenres as $genre)
                                        @if ($loop->first)
                                        <a class="link link-dark" href="#">{{ $genre->name }}</a>
                                        @else
                                        | <a class="link link-dark" href="#">{{ $genre->name }}</a>
                                        @endif
                                        @endforeach
                                    </p>
                                    <p class="card-text">Rated: <b class="text-danger">{{ $movie->rating->name }}</b>
                                        - {{ $movie->rating->description }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <!-- Movie: end -->
            @endforeach
        </div>

        <div id="phimmoi" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse show" data-bs-parent="#mainContent">
            @foreach($movies as $movie)

            <!-- Movie -->
            <div class="card-col">
                <article class="card px-0 overflow-hidden" style="background: #f5f5f5; ">
                    <div class="row g-0">
                        <div class="col-lg-4 col-12">
                            <a href="/movie/{{ $movie->id }}">
                                @if(strstr($movie->image,"https") == "")
                                <img src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $movie['image'] !!}.jpg" class="img-fluid rounded" style="width: 210px; height: 280px" alt="...">
                                @else
                                <img src="{{ $movie->image }}" class="img-fluid rounded" style="width: 210px; height: 280px" alt="...">
                                @endif
                            </a>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="card-body">
                                <a href="movie/{{ $movie->id }}" class="link link-dark text-decoration-none">
                                    <h5 class="card-title">{{ $movie->name }}</h5>
                                    <p class="card-text text-danger">{{ $movie->showTime }} phút</p>
                                    <p class="card-text">Thể loại:
                                        @foreach($movie->movieGenres as $genre)
                                        @if ($loop->first)
                                        <a class="link link-dark" href="#">{{ $genre->name }}</a>
                                        @else
                                        | <a class="link link-dark" href="#">{{ $genre->name }}</a>
                                        @endif
                                        @endforeach
                                    </p>
                                    <p class="card-text">Đạo diễn:
                                        @foreach($movie->directors as $director)
                                        @if ($loop->first)
                                        {{ $director->name }}
                                        @else
                                        , {{ $director->name }}
                                        @endif
                                        @endforeach
                                    </p>
                                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1;
                                                        -webkit-box-orient: vertical">
                                        Diễn viên:
                                        @foreach($movie->casts as $cast)
                                        @if ($loop->first)
                                        {{ $cast->name }}
                                        @else
                                        , {{ $cast->name }}
                                        @endif
                                        @endforeach
                                    </p>
                                    <p class="card-text">Giới hạn độ tuổi:
                                        <span class="badge @if($movie->rating->name == 'C18') bg-danger
                                                                        @elseif($movie->rating->name == 'C16') bg-warning
                                                                        @elseif($movie->rating->name == 'P') bg-success
                                                                        @elseif($movie->rating->name == 'P') bg-primary
                                                                        @else bg-info
                                                                        @endif me-1">
                                            {{ $movie->rating->name }}
                                        </span> - {{ $movie->rating->description }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <!-- Movie: end -->

            @endforeach
        </div>

        <div class="row m-2 mb-5 justify-content-end">
            <a href="/movies" class="btn btn-outline-green w-auto">Xem thêm></a>
        </div>

       
    </div>
</section>

@endsection