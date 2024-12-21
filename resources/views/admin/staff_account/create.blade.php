<form action="admin/staff/create" method="POST">
    @csrf
    <div class="modal fade" id="staff" tabindex="-1" aria-labelledby="staff_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staff_title">QUẢN LÝ NHÂN VIÊN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Họ Tên</label>
                                    <input aria-label="" id="fn" class="form-control" type="text" value="" name="fullName"
                                           placeholder="Nhập họ tên...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input aria-label="" id="e" class="form-control" type="email" value="" name="email"
                                           placeholder="Nhập email...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SĐT</label>
                                    <input aria-label="" id="p" class="form-control" type="text" value="" name="phone"
                                           placeholder="Nhập SĐT...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input aria-label="" id="rp" class="form-control" type="password" value="" name="password"
                                           placeholder="Nhập mật khẩu...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>theater</label>
                                    <select id="t" aria-label="" class="form-control" name="theater_id">
                                        @foreach($theaters as $theater)
                                            <option value="{{$theater->id}}">{{$theater->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn bg-gradient-success">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</form>
