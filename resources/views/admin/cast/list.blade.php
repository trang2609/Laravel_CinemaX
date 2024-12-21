@extends('admin.layout.index')
@section('content')
    @can('cast')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>QUẢN LÝ DIỄN VIÊN</h6>
                            <a style="float:right;padding-right:30px;" class="text-light">
                                <button class=" btn btn-success float-right mb-3" data-bs-toggle="modal" data-bs-target="#cast">Thêm</button>
                            </a>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-dark text-center text-xxs font-weight-bolder opacity-7">Tên diễn viên</th>
                                        <th class="text-uppercase text-dark text-center text-xxs font-weight-bolder opacity-7">Hình ảnh</th>
                                        <th class="text-uppercase text-dark text-center text-xxs font-weight-bolder opacity-7">Ngày sinh</th>
                                        <th class="text-uppercase text-dark text-center text-xxs font-weight-bolder opacity-7">Quốc gia</th>
                                        <th class="text-left text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Giới thiệu</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cast as $value)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{!! $value['name'] !!}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if(strstr($value['image'],"https") == "")
                                                    <img style="width: 100px"
                                                         src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['image'] !!}.jpg"
                                                         alt="user1">
                                                @else
                                                    <img style="width: 100px"
                                                         src="{!! $value['image'] !!}" alt="user1">
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{!! $value['birthday'] !!}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary font-weight-bold">{!! $value['national'] !!}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="mb-0 text-sm "
                                                      style="width:200px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical">{!! $value['content'] !!}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="#editCast" class="text-success font-weight-bold text-xs" data-toggle="tooltip"
                                                   data-original-title="Edit cast" data-bs-target="#editCast{!! $value['id'] !!}"
                                                   data-bs-toggle="modal">
                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:void(0)" data-url="{{ url('admin/cast/delete', $value['id'] ) }}"
                                                   class="text-danger font-weight-bold text-xs delete-cast" data-toggle="tooltip">
                                                    <i class="fa-solid fa-trash-can fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @include('admin.cast.edit')
                                    @endforeach
                                    @include('admin.cast.create')
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $cast->links() !!}
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
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.delete-cast').on('click', function () {
                var userURL = $(this).data('url');
                var trObj = $(this);
                if (confirm("Bạn có chắc chắn muốn xóa thông tin của diễn viên này không?") == true) {
                    $.ajax({
                        url: userURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (data) {
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
                reader.onload = function (e) {
                    $('.file-uploader .img_cast').attr('src', e.target.result).removeClass('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".image-cast").change(function () {
            readURL(this);
        });
    </script>
@endsection
