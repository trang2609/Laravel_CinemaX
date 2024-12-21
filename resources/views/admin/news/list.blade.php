@extends('admin.layout.index')
@section('content')
@can('events')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>QUẢN LÝ TIN TỨC</h6>
                    <a style="float:right;padding-right:30px;" class="text-light">
                        <button class=" btn btn-success float-right mb-3" data-bs-toggle="modal" data-bs-target="#news">Thêm</button>
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-dark text-center text-xxs font-weight-bolder opacity-7">Tiêu đề</th>
                                    <th class="text-left text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Hình ảnh</th>
                                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nội dung</th>
                                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Nhân viên tạo</th>
                                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Ngày tạo</th>
                                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Ngày cập nhật</th>
                                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7"></th>
                                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $value)
                                <tr>
                                    <td class="align-middle text-center">
                                        <h6 class="mb-0 text-sm " style="width:200px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical">{!! $value['title'] !!}</h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        @if(strstr($value['image'],"https") == "")
                                        <img style="width: 100px" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['image'] !!}.jpg" alt="user1">
                                        @else
                                        <img style="width: 100px" src="{!! $value['image'] !!}" alt="user1">
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm ">
                                        <span class="mb-0 text-sm " style="width:200px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical">{!! $value['content'] !!}</span>
                                    </td>

                                    <td id="status{!! $value['id'] !!}" class="align-middle text-center text-sm">
                                        @if($value->status == 1)

                                        <a href="javascript:void(0)" class="btn_active" onclick="changestatus({!! $value['id'] !!},0)">
                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                        </a>

                                        @else
                                        <a href="javascript:void(0)" class="btn_active" onclick="changestatus({!! $value['id'] !!},1)">
                                            <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                        </a>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-bold">{!! $value['users']['fullName'] !!}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-bold">{!! $value['created_at'] !!}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-bold">{!! $value['updated_at'] !!}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#editNews" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit news" data-bs-target="#editNews{!! $value['id'] !!}" data-bs-toggle="modal">
                                            <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:void(0)" data-url="{{ url('admin/news/delete', $value['id'] ) }}" class="text-danger font-weight-bold text-xs delete-news" data-toggle="tooltip">
                                            <i class="fa-solid fa-trash-can fa-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                                @include('admin.news.edit')
                                @endforeach
                                @include('admin.news.create')
                            </tbody>
                        </table>
                    </div>
                    <div id="paginate" class="d-flex justify-content-center mt-3">
                        {!! $news->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<h1 align="center">Permissions Deny</h1>
@endcan
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete-news').on('click', function() {
            var userURL = $(this).data('url');
            var trObj = $(this);
            if (confirm("Bạn có chắc chắn muốn xóa tin tức này?") === true) {
                $.ajax({
                    url: userURL,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        if (data['success']) {
                            // alert(data.success);
                            trObj.parents("tr").remove();
                        } else if (data['error']) {
                            alert(data.error);
                        }
                    }
                });
            }

        });
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.file-uploader .img_news').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".image-news").change(function() {
        readURL(this);
    });
</script>
<script>
    function changestatus(news_id, active) {
        if (active === 1) {
            $("#status" + news_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changestatus(' + news_id + ',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
            </a>')
        } else {
            $("#status" + news_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changestatus(' + news_id + ',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/admin/news/status",
            type: 'GET',
            dataType: 'json',
            data: {
                'active': active,
                'news_id': news_id
            },
            success: function(data) {
                if (data['success']) {
                    // alert(data.success);
                } else if (data['error']) {
                    alert(data.error);
                }
            }
        });
    }
</script>
@endsection