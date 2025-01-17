@extends('web.layout.index')
@section('css')
    .image img{
        width: 100%;
    }
    .mt-4{
        color: #72be43;
    }
@endsection
@section('content')
    <section class="container-lg">
        {{--  Breadcrumb  --}}
        <nav aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="link link-dark text-decoration-none">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#" class="link link-dark text-decoration-none">Sự kiện</a></li>
                <li class="breadcrumb-item active" aria-current="page">{!! $post['title'] !!}</li>
            </ol>
        </nav>
        {{--  Event title  --}}
        <div class="row container">
            <h2 class="mt-4">{!! $post['title'] !!}</h2>
            <div class="accordion-item">
                <div class="accordion-body  mt-4 mb-3" style="color: black;">
                    {!! $post['content'] !!}
                </div>
            </div>
            <div class="text-center">
                @if(strstr($post['image'],"https") == "")
                    <img style="width: 75%" class="card-img-top rounded-0" alt='...'
                         src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $post['image'] !!}.jpg">
                @else
                    <img style="width: 75%" class="card-img-top rounded-0" alt='...'
                         src="{!! $post['image'] !!}">
                @endif
            </div>
        </div>
        <div class="col container">
            <h5 class="mt-4">Điều kiện áp dụng</h5>
            <p>{!! $post['conditions'] !!}</p>
        </div>
        <div class="row container">
            <h5 class="mt-4">Sự kiện khác</h5>
            @foreach($post_all as $value)
            <div class="col-sm-6 col-lg-3">
                <div class="card border border-4 border-success rounded-0">
                    <a href="/events-detail/{!! $value['id'] !!}">
                @if(strstr($value['image'],"https") == "")
                    <img class="card-img-top rounded-0" alt='...'
                         src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['image'] !!}.jpg">
                @else
                    <img class="card-img-top rounded-0" alt='...'
                         src="{!! $value['image'] !!}">
                @endif
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection

