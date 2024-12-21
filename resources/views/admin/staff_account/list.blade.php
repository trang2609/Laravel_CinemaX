@extends('admin.layout.index')
@section('content')
@role('admin')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>QUẢN LÝ NHÂN VIÊN</h6>
                    <button style="float:right;padding-right:30px;" class="me-5  btn bg-gradient-success float-right mb-3" data-bs-toggle="modal" data-bs-target="#staff">
                            Thêm
                    </button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        Tên nhân viên
                                    </th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        SĐT
                                    </th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        Vai trò
                                    </th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        Phân quyền
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Trạng thái
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staff as $value)
                                {{-- @foreach($value['roles'] as $role)--}}
                                @if($value->getRoleNames()->first() == 'admin' || $value->getRoleNames()->first() == 'staff')
                                <tr>
                                    <td class="align-middle text-center">
                                        <h6 class="mb-0 text-sm ">{!! $value['fullName'] !!}</h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-bold">{!! $value['email'] !!}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-bold">{!! $value['phone'] !!}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary font-weight-bold"> {!! $value->getRoleNames()->first() !!}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button href="#permission" class="btn btn-link text-danger " data-bs-toggle="modal" data-bs-target="#permission{!! $value['id'] !!}">
                                            Phân quyền &nbsp<i style="color:red" class="fa-solid fa-pen-to-square fa-lg"></i>
                                        </button>
                                    </td>
                                    <td id="status{!! $value['id'] !!}" class="align-middle text-center text-sm ">
                                        @if($value['status'] == 1)
                                        <a href="javascript:void(0)" class="btn_active" onclick="changestatus({!! $value['id'] !!},0)">
                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                        </a>
                                        @else
                                        <a href="javascript:void(0)" class="btn_active" onclick="changestatus({!! $value['id'] !!},1)">
                                            <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                        </a>
                                        @endif
                                    </td>
                                    @hasrole('admin')
                                    <td class="align-middle">
                                        <a href="javascript:void(0)" data-url="{{ url('admin/staff/delete', $value['id'] ) }}" class="text-danger font-weight-bold text-xs delete-staff" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fa-solid fa-trash-can fa-lg"></i>
                                        </a>
                                    </td>
                                    @endhasrole
                                </tr>
                                @include('admin.staff_account.permisson')
                                @endif
                                {{-- @endforeach--}}
                                @endforeach
                                @include('admin.staff_account.create')
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        {!! $staff->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<h1 align="center">Permissions Deny</h1>
@endrole
@endsection
@section('scripts')
<script>
    function selects() {
        var ele = document.getElementsByName('permission[]');
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type === 'checkbox')
                ele[i].checked = true;
        }
    }

    function unselects() {
        var ele = document.getElementsByName('permission[]');
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type === 'checkbox')
                ele[i].checked = false;
        }
    }
</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete-staff').on('click', function() {
            var userURL = $(this).data('url');
            var trObj = $(this);
            if (confirm("Bạn có chắc chắn muốn xóa nhân viên này không?") === true) {
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
    function changestatus(user_id, active) {
        if (active === 1) {
            $("#status" + user_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changestatus(' + user_id + ',0)">\
            <span class="badge badge-sm bg-gradient-success">Online</span>\
    </a>')
        } else {
            $("#status" + user_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changestatus(' + user_id + ',1)">\
            <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
    </a>')
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/admin/user/status",
            type: 'GET',
            dataType: 'json',
            data: {
                'active': active,
                'user_id': user_id
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