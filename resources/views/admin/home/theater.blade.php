    <div class="modal fade" id="theater_modal" tabindex="-1" aria-labelledby="theater_modal_title" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="theater_modal_title">
                        DOANH THU THEO RẠP
                        <label for="search_theater">
                            <input type="text" placeholder="Nhập tên rạp... " class="form-controller" id="search_theater" name="search_theater" />
                        </label>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table align-items-center ">
                                    <tbody id="tbody_theater">
                                        @foreach($theaters as $theater)
                                        <tr>
                                            <td class="w-30">
                                                <div class="d-flex px-2 py-1 align-items-center">
                                                    <div class="ms-4">
                                                        <p class="text-xs font-weight-bold mb-0">Tên rạp</p>
                                                        <h6 class="text-sm mb-0">{!! $theater['name'] !!}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">Vé bán ra</p>
                                                    <h6 class="text-sm mb-0">
                                                        {{$theater['ticketseats']}}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">Tổng tiền</p>
                                                    <h6 class="text-sm mb-0">
                                                        {{number_format($theater['totalPrice'],0,",",".")}} đ
                                                    </h6>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
