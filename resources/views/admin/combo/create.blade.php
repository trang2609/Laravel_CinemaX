<form action="admin/combo/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="combo" tabindex="-1" aria-labelledby="combo_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="combo_title">Thêm mới combo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nameCreate">Tên combo</label>
                                    <input id="nameCreate" class="form-control" type="text" name="name" required autocomplete="off"
                                           placeholder="Nhập tên combo đồ ăn...">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="priceCreate">Giá</label>
                                    <input id="priceCreate" class="form-control" type="number" name="price"
                                           placeholder="Nhập giá combo...">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group file-uploader">
                                    <label for="imgCreate">Ảnh minh họa</label>
                                    <input id="imgCreate" type='file' name='Image' class="form-control image-combo">
                                    <img style="width: 150px" src="" class="img_combo d-none" alt="...">
                                </div>
                            </div>
                            <div class="col-12 food_group">
                                <span class="form-label">Đồ ăn</span>
                                <div class="input-group m-1">
                                    <span class="input-group-text text-black-50">Đồ ăn: </span>
                                    <select type='text' name='food[]' class="form-select" aria-label="food">
                                        @foreach($foods as $food)
                                            <option value="{{$food->id}}">{{$food->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-text text-black-50">Số lượng: </span>
                                    <input type="number" name="quantity[]" class="form-control" placeholder="quantity..." aria-label="quantity">
                                    <button type="button" class="btn btn-danger mb-0 delete_food"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                            <button type="button" class="btn m-1 btn-primary add_food">Thêm đồ ăn</button>
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


