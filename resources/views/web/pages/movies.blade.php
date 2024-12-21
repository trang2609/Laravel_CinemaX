@extends('web.layout.index')
@section('movies')
    active
@endsection
@section('content')

<style>

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
</style>
    <section class="container-lg clearfix">
        <!-- Main content -->
        <div class="mt-5" id="Movies">
            <ul class="nav justify-content-start mb-4 align-items-center">
                <li class="nav-item">
                    <button class="h5 nav-link link-success active fw-bold border-bottom border-2 border-success"
                            aria-expanded="true"
                            data-bs-toggle="collapse"
                            data-bs-target="#phimdangchieu" disabled>
                        Phim đang chiếu
                    </button>
                </li>
                <li class="vr mx-5"></li>
                <li class="nav-item">
                    <button class="h5 nav-link link-secondary"
                            aria-expanded="false"
                            data-bs-toggle="collapse" data-bs-target="#phimsapchieu">
                        Phim sắp chiếu
                    </button>
                </li>

                <li class="vr mx-5"></li>
                <li class="nav-item me-auto">
                    <button class="h5 nav-link link-secondary"
                            aria-expanded="false"
                            data-bs-toggle="collapse" data-bs-target="#vebantruoc">
                        Vé bán trước
                    </button>
                </li>
            </ul>

            <div id="phimsapchieu" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse" data-bs-parent="#Movies">
                @foreach($moviesSoon as $movie)
                        <!-- Movie -->
                        <div class="card-col">
                            <article class="card px-0 overflow-hidden" style="background: #f5f5f5">
                                <div class="row g-0">
                                    <div class="col-lg-4 col-12">
                                        <a href="/movie/{{ $movie->id }}">
                                            @if(strstr($movie->image,"https") == "")
                                                <img class="img-fluid rounded "
                                                     src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{ $movie->image }}.jpg"
                                                     alt="" style="width: 210px; height: 280px">
                                            @else
                                                <img class="img-fluid rounded " style="width: 210px; height: 280px" src="{{ $movie->image }}" alt="">
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
                                                            <a class="link link-dark text-decoration-none" href="#">{{ $director->name }}</a>
                                                        @else
                                                            , <a class="link link-dark text-decoration-none" href="#">{{ $director->name }}</a>
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <p class="card-text">Diễn viên:
                                                    @foreach($movie->casts as $cast)
                                                        @if ($loop->first)
                                                            <a class="link link-dark text-decoration-none" href="#">{{ $cast->name }}</a>
                                                        @else
                                                            , <a class="link link-dark text-decoration-none" href="#">{{ $cast->name }}</a>
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <p class="card-text">Giới hạn độ tuổi:
                                                    <span class="badge @if($movie->rating->name == 'C18') bg-danger
                                                                        @elseif($movie->rating->name == 'C16') bg-warning
                                                                        @elseif($movie->rating->name == 'P') bg-success
                                                                        @elseif($movie->rating->name == 'P') bg-primary
                                                                        @else bg-info
                                                                        @endif me-1"
                                                    >
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

            <div id="phimdangchieu" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse show" data-bs-parent="#Movies">
                @foreach($movies as $movie)
                        <!-- Movie -->
                        <div class="card-col">
                            <article class="card px-0 overflow-hidden" style="background: #f5f5f5">
                                <div class="row g-0">
                                    <div class="col-lg-4 col-12">
                                        <a href="/movie/{{ $movie->id }}">
                                            @if(strstr($movie->image,"https") == "")
                                                <img class="img-fluid rounded "
                                                     src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{ $movie->image }}.jpg"
                                                     alt="" style="width: 210px; height: 280px">
                                            @else
                                                <img class="img-fluid rounded " src="{{ $movie->image }}" alt="" style="width: 210px; height: 280px">
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
                                                            <a class="link link-dark text-decoration-none" href="#">{{ $director->name }}</a>
                                                        @else
                                                            , <a class="link link-dark text-decoration-none" href="#">{{ $director->name }}</a>
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <p class="card-text">Diễn viên:
                                                    @foreach($movie->casts as $cast)
                                                        @if ($loop->first)
                                                            <a class="link link-dark text-decoration-none" href="#">{{ $cast->name }}</a>
                                                        @else
                                                            , <a class="link link-dark text-decoration-none" href="#">{{ $cast->name }}</a>
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <p class="card-text">Rated:
                                                    <span class="badge @if($movie->rating->name == 'C18') bg-danger
                                                                        @elseif($movie->rating->name == 'C16') bg-warning
                                                                        @elseif($movie->rating->name == 'P') bg-success
                                                                        @elseif($movie->rating->name == 'P') bg-primary
                                                                        @else bg-info
                                                                        @endif me-1"
                                                    >
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

            <div id="vebantruoc" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse" data-bs-parent="#Movies">
                @foreach($moviesEarly as $movie)
                    <!-- Movie -->
                    <div class="card-col">
                        <article class="card px-0 overflow-hidden" style="background: #f5f5f5">
                            <div class="row g-0">
                                <div class="col-lg-4 col-12">
                                    <a href="/movie/{{ $movie->id }}">
                                        @if(strstr($movie->image,"https") == "")
                                            <img class="img-fluid rounded "
                                                 src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{ $movie->image }}.jpg"
                                                 alt="" style="width: 210px; height: 280px">
                                        @else
                                            <img class="img-fluid rounded " src="{{ $movie->image }}" alt="" style="width: 210px; height: 280px">
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
                                                        <a class="link link-dark text-decoration-none" href="#">{{ $director->name }}</a>
                                                    @else
                                                        , <a class="link link-dark text-decoration-none" href="#">{{ $director->name }}</a>
                                                    @endif
                                                @endforeach
                                            </p>
                                            <p class="card-text text-truncate">Diễn viên:
                                                @foreach($movie->casts as $cast)
                                                    @if ($loop->first)
                                                        <a class="link link-dark text-decoration-none" href="#">{{ $cast->name }}</a>
                                                    @else
                                                        , <a class="link link-dark text-decoration-none" href="#">{{ $cast->name }}</a>
                                                    @endif
                                                @endforeach
                                            </p>
                                            <p class="card-text">Rated:
                                                <span class="badge @if($movie->rating->name == 'C18') bg-danger
                                                                        @elseif($movie->rating->name == 'C16') bg-warning
                                                                        @elseif($movie->rating->name == 'P') bg-success
                                                                        @elseif($movie->rating->name == 'P') bg-primary
                                                                        @else bg-info
                                                                        @endif me-1"
                                                >
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
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.director-input').select2({
                tags: true
            });

            $('#rating').select2({
                tags: true
            })

            $('#movieGenres').select2({
                tags: true
            });

            $('.cast-input').select2({
                tags: true
            });

            $("#Movies .nav .nav-item .nav-link").on("click", function () {
                $("#Movies .nav-item").find(".active").removeClass("active link-success fw-bold border-bottom border-2 border-success").addClass("link-secondary").prop('disabled', false);
                $(this).addClass("active link-success fw-bold border-bottom border-2 border-success").removeClass("link-secondary").prop('disabled', true);
            });
        });
    </script>
@endsection
