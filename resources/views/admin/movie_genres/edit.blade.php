<form action="admin/movie_genres/edit/{!! $value['id'] !!}" method="POST">
    @csrf
    <div class="modal fade" id="editModal{!! $value['id'] !!}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Sửa thông tin thể loại phim</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Tên thể loại phim</label>
                                    <input class="form-control" id="name" type="text" value="{!! $value['name'] !!}" name="name">
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
