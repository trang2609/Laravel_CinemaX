<form action="admin/food/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="food" tabindex="-1" aria-labelledby="food_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="food_title">Thêm đồ ăn mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tên đồ ăn</label>
                                    <input class="form-control" type="text" value="" name="name"
                                           placeholder="Nhập tên đồ ăn...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Giá</label>
                                    <input class="form-control" type="number" value="" name="price"
                                           placeholder="Nhập giá bán...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group file-uploader">
                                    <label for="example-text-input" class="form-control-label">Ảnh minh họa</label>
                                    <input type='file' name='Image' class="form-control image-food">
                                    <img style="width: 300px" src="" class="img_food d-none" alt="user1">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>

            </div>
        </div>
    </div>
</form>
