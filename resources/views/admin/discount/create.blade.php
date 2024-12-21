<form action="admin/discount/create" method="POST" >
    @csrf
    <div class="modal fade" id="discount" tabindex="-1" aria-labelledby="discount_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="discount_title">Thêm mới mã khuyến mãi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="code" class="form-control-label">Tên</label>
                                    <input class="form-control" id="name" type="text" value="" name="name"
                                           placeholder="Nhập tên...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="code" class="form-control-label">Mã khuyến mãi</label>
                                    <input class="form-control" id="code" type="text" value="" name="code"
                                           placeholder="Nhập mã khuyến mãi">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="percent" class="form-control-label">Phần trăm</label>
                                    <input class="form-control" id="percent" type="number" value="" name="percent"
                                           placeholder="Nhập % giảm giá...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="quantity" class="form-control-label">Số lượng</label>
                                    <input class="form-control" id="quantity" type="number" value="" name="quantity" placeholder="Nhập số lượng">
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
