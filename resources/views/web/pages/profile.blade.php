<style>
    .nav-link {
        color: #2d8a3b !important;
    }

    .nav-link.active {
        background-color: #2d8a3b !important;
        color: white !important;
    }

    .p-4 h4 {
    color: #2d8a3b; 
    }

    .label-green {
    color: #28a745; 
    }
    
    th.text-xxs.text-center {
    color: #28a745;
    }
    
    .table-bordered {
    border-collapse: collapse; 
    width: 100%;
    }

    .table-bordered th, .table-bordered td {
        border: 1px solid #28a745; 
        padding: 8px;
        text-align: center; 
    }

    .table-bordered thead th {
        border-top: 1px solid #28a745; 
    }

    .table-bordered tr {
        border-bottom: 1px solid #28a745; 
    }
</style>

@extends('web.layout.index')
@section('link_css')
<link rel="stylesheet" type="text/css" href="/web_assets/css/style.css">
@endsection
@section('content')
@php
$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
@endphp
<section class="py-0 my-0">
    <div class="container">
        <h1 class="mb-5"></h1>
        <div class="bg-white shadow rounded-lg d-block d-sm-flex">
            <div class="profile-tab-nav border-right">
                <div class="p-4">
                    <h4 class="text-center">{!! $user['fullName'] !!}</h4>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="account-tab" href="#account" data-bs-toggle="collapse" data-bs-target="#account" aria-expanded="true" aria-controls="account">
                        <i class="fa fa-home text-center mr-1"></i>
                       Tài khoản
                    </a>
                    <a class="nav-link" id="password-tab" href="#password" data-bs-toggle="collapse" data-bs-target="#password" aria-expanded="false">
                        <i class="fa fa-key text-center mr-1"></i>
                        Mật khẩu
                    </a>
                    <a class="nav-link" id="notification-tab" href="#notification" data-bs-toggle="collapse" data-bs-target="#notification" aria-expanded="false">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        Lịch sử giao dịch
                    </a>
                </div>
            </div>
            <div class="tab-content p-4 p-md-5">
                <div id="mainContent">
                    <form action="/editProfile" method="POST">
                        @csrf
                        <div class="collapse show" id="account" data-bs-parent="#mainContent">
                            <div aria-labelledby="account-tab">
                                <h4 class="text-center">THẺ THÀNH VIÊN</h4>
                                <div class="text-center">
                                    <img src="data:image/png;base64,{!! base64_encode($generatorPNG->getBarcode($user['code'],$generatorPNG::TYPE_CODE_128)) !!}" />
                                </div>
                                <div class="text-center">
                                    {!! $user['code'] !!}
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label-green">Họ tên</label>
                                            <input type="text" class="form-control" name="fullName" required value="{!! $user['fullName'] !!}" aria-label="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label-green">Email</label>
                                            <input type="email" class="form-control" name="email" value="{!! $user['email'] !!}" aria-label="">
                                            <labeL class="text-danger">
                                                @if(isset($user['email']) && $user['email_verified']== 0)
                                                Vui lòng kích hoạt email để nhận ưu đãi từ CinemaX!!
                                                @endif
                                            </labeL>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label-green">SĐT</label>
                                            <input type="text" class="form-control" name="phone" value="{!! $user['phone'] !!}" aria-label="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="col text-end">
                                            <img style="width: 40px" src="images/icon/vip.ico">
                                        </div>
                                        <div class="col">
                                            <div class="progress">
                                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{!! $sum_percent !!}" aria-valuemin="0" aria-valuemax="100" 
                                                @if($sum_percent <100) 
                                                style="width:{!! $sum_percent !!}%" 
                                                @else 
                                                style="width:100%" 
                                                @endif>
                                                    @if($sum_percent < 100) {!! round($sum_percent) !!}% @else 100% @endif </div>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="col-md-12 mt-4">
                                            <table class="table table-bordered ">
                                                <thead>
                                                    <tr>
                                                        <th class="text-xxs text-center">Cấp độ thẻ</th>
                                                        <th class="text-xxs text-center">Tổng chi tiêu</th>
                                                        <th class="text-xxs text-center">Điểm</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">
                                                            @if($sum < 4000000) Member @else Vip @endif </td>
                                                        <td class="text-center">{!! number_format($sum,0,",",".") !!} VNĐ</td>
                                                        <td class="text-center">{!! number_format($user['point'],0,",",".") !!} P</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-success" type="submit">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <form action="/changePassword" method="POST">
                        @csrf
                        <div class="collapse" id="password" data-bs-parent="#mainContent">
                            <div aria-labelledby="password-tab">
                                <h3 class="mb-4"></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label-green">Mật khẩu cũ</label>
                                            <input type="password" name="oldpassword" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label-green">Mật khẩu mới</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label-green">Nhập lại mật khẩu mới</label>
                                            <input type="password" name="repassword" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-success" type="submit">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="collapse" id="notification" data-bs-parent="#mainContent">
                        <div aria-labelledby="notification-tab">
                            <h3 class="mb-4 text-center text-success">LỊCH SỬ GIAO DỊCH</h3>
                            <div class="container ">
                                @foreach($sort_ticket as $value)
                                @if(isset($value['schedule']['movie']['image']))
                                <p style="margin-top: 10px!important;">Mã vé: {!! $value['code'] !!} <span>
                                        (Trạng thái:
                                        @if($value['holdState'] == 0 && $value['status'] ==1)
                                        Đã hoàn tất)
                                        @elseif($value['holdState'] == 1 && $value['status'] ==1)
                                        Đã hoàn tất)
                                        @else
                                        Đã hoàn tất)
                                        @endif</span> </p>
                                <div class="float-start">

                                    @if(strstr($value['schedule']['movie']['image'],"https") == "")
                                    <img style="width: auto;height: 320px;" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['schedule']['movie']['image'] !!}.jpg">
                                    @else
                                    <img style="width: auto;height: 320px;" src="{!! $value['schedule']['movie']['image'] !!}">
                                    @endif


                                </div>
                                <div style="margin-left: 30%;">
                                    <p>{!! $value['schedule']['movie']['name'] !!}</p>
                                    <p class="badge
                                            @if($value['schedule']['movie']['rating']['name'] == 'C18') bg-danger
                                            @elseif($value['schedule']['movie']['rating']['name'] == 'C16') bg-warning
                                            @elseif($value['schedule']['movie']['rating']['name'] == 'P') bg-success
                                            @elseif($value['schedule']['movie']['rating']['name'] == 'K') bg-primary
                                            @else bg-info
                                            @endif me-1"> {!! $value['schedule']['movie']['rating']['name'] !!} </p>
                                    <p>{!! date("d/m/Y",strtotime($value['schedule']['date'] )) !!}</p>
                                    <p>Từ {!! date("H:i A",strtotime($value['schedule']['startTime'] )) !!} ~ Đến {!! date("H:i A",strtotime($value['schedule']['endTime'] )) !!}</p>
                                    <p>{!! $value['schedule']['room']['theater']['name'] !!}</p>
                                    <p>{!! $value['schedule']['room']['name'] !!}
                                        (
                                        @foreach($value['ticketSeats'] as $seat)
                                        @if ($loop->first)
                                        {{ $seat->row.$seat->col }}
                                        @else
                                        ,{{ $seat->row.$seat->col }}
                                        @endif
                                        @endforeach
                                        )
                                    </p>
                                    <p>{!! number_format($value['totalPrice'],0,",",".") !!}</p>
                                    @if($value['holdState'] == 0)
                                    <button href="#profileModal" data-toggle="tooltip" data-bs-target="#profileModal{!! $value['id'] !!}" data-bs-toggle="modal" class="btn btn-success">Chi tiết</button>
                                    <a href="/tickets/completed/{!! $value['id'] !!}" class="btn btn-success"><i class="fa-solid fa-ticket"></i></a>
                                    @else
                                    <button class="btn btn-warning" disabled>X</button>
                                    @endif
                                    @include('web.pages.profile_modal')
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $(".nav .nav-link").on("click", function(e) {
            $(".nav").find(".active").removeClass("active");
            $(e.target).addClass("active");
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#download").click(function() {
            screenshot();
        });
    });

    function screenshot() {
        html2canvas(document.getElementById("photo")).then(function(canvas) {
            downloadImage(canvas.toDataURL(), "BillInfo.png");
        });
    }

    function downloadImage(uri, filename) {
        var link = document.createElement('a');
        if (typeof link.download !== 'string') {
            window.open(uri);
        } else {
            link.href = uri;
            link.download = filename;
            accountForFirefox(clickLink, link);
        }
    }

    function clickLink(link) {
        link.click();
    }

    function accountForFirefox(click) {
        var link = arguments[1];
        document.body.appendChild(link);
        click(link);
        document.body.removeChild(link);
    }
</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.refund-ticket').on('click', function() {
            var ticket_id = $(this).data("id");
            if (confirm("Bạn có chắc chắn muốn hoàn vé ?") === true) {
                $.ajax({
                    url: '/refund-ticket',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'ticket_id': ticket_id,
                    },
                    success: function(data) {
                        if (data['success']) {
                            alert(data.success);
                            window.location.reload();
                        } else if (data['error']) {
                            alert(data.error);
                        }
                    }
                });
            }
        });
    });
</script>
@endsection