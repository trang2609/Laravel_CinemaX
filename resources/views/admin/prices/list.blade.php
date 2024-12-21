@extends('admin.layout.index')
@section('css')
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>QUẢN LÝ GIÁ VÉ</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 mt-5">
                        <div class="table-responsive ">
                            <form action="admin/prices/edit" method="post">
                                @csrf
                                <table class="table table-bordered align-items-center text-center">
                                    <thead class="table-success">
                                    <tr>
                                        <th class="text-uppercase font-weight-bolder"></th>
                                        <th class="text-uppercase font-weight-bolder"></th>
                                        <th class="text-uppercase font-weight-bolder">Thành viên</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-white">
                                    <tr>
                                        <th rowspan="2">
                                            Thứ Hai, Thứ Ba,Thứ Tư, Thứ Năm
                                        </th>
                                        <td>Trước 17h</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="vtt2345t17" value="{{ $vtt2345t17 }}" aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sau 17h</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="vtt2345s17" value="{{ $vtt2345s17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">
                                            Thứ Sáu,   Thứ Bảy,  Chủ Nhật
                                        </th>
                                        <td>Trước 17h</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="vtt67cnt17" value="{{ $vtt67cnt17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sau 17h</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="vtt67cns17" value="{{ $vtt67cns17 }}"
                                                       aria-label="">
                                                <span class="input-group-text">đ</span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <thead class="table-success">
                                    <tr>
                                        <th class="text-uppercase font-weight-bolder" colspan="6">
                                            PHỤ THU
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-white">
                                    @foreach($roomTypes as $roomType)
                                        <tr>
                                            <td class="text-end">
                                                {{ $roomType->name }}
                                            </td>
                                            <td colspan="5">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="{{ $roomType->name }}"
                                                           value="{{ $roomType->surcharge }}"
                                                           aria-label="">
                                                    <span class="input-group-text">đ</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach($seatTypes as $seatType)
                                        <tr>
                                            <td class="text-end">
                                                Ghế {{ $seatType->name }}
                                            </td>
                                            <td colspan="5">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="{{ $seatType->name }}"
                                                           value="{{ $seatType->surcharge }}"
                                                           aria-label="">
                                                    <span class="input-group-text">đ</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    <tr>
                                        <td colspan="6">
                                            <button type="submit" class="btn btn-success float-end m-2">Lưu</button>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
