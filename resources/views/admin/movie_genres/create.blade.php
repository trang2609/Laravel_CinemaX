<form action="admin/movie_genres/create" method="POST">
    @csrf
    <div class="modal fade" id="movie_genre" tabindex="-1" aria-labelledby="movie_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="movie_title">Thêm thể loại phim</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tên thể loại phim</label>
                                    <input class="form-control" type="text" value="" name="name" placeholder="Nhập tên thể loại phim...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success">Lưu/button>
                </div>
            </div>
        </div>
    </div>
</form>
