
<div class="row mt-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>THỐNG KÊ DOANH THU</h6>
            </div>
            <div class="card-body ms-8">
                <div class="row">
                        <div class="col-md-5">
                            <label for="start_time" class="form-control-label">Ngày bắt đầu</label>
                            <div class="form-group" style="text-align:center">
                                <input name="start_time"  id="start_time" class="form-control datepicker" placeholder="Please select date" type="text">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="end_time"  class="form-control-label">Ngày kết thúc</label>
                            <div class="form-group" style="text-align:center">
                                <input name="end_time" id="end_time" value="{!! date("Y-m-d") !!}" class="form-control datepicker" placeholder="Please select date" type="text" >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button  id="btn-statistical-filter" class="form-control">Xác nhận</button>
                            </div>
                        </div>

                    <div class="col-md-6">
                        <label for="statistical" class="form-control-label">Lọc theo thời gian</label>
                        <div class="form-group" style="text-align:center">
                            <select id="statistical" style="width: 70%" class="statistical-filter form-control">
                                <option value="null" selected>Chọn</option>
                                <option value="week" >Lọc 7 ngày</option>
                                <option value="this_month">Lọc tháng này</option>
                                <option value="last_month">Lọc tháng trước</option>
                                <option value="year">Lọc theo năm</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="theater" class="form-control-label">Lọc theo vé/rạp</label>
                        <div class="form-group" style="text-align:center">
                            <select id="theater" style="width: 70%" class="statistical-sortby form-control">
                                <option value="null" selected>Chọn</option>
                                <option value="ticket">Lọc theo vé</option>
                                <option value="theater">Lọc theo rạp</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 ">
    <div id="admin_chart" style="height: 300px; width: 100%" ></div>
</div>

