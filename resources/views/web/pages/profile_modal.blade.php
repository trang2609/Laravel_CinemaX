 <div  class="modal fade  modal-lg" id="profileModal{!! $value['id'] !!}" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="profileModalLabel">Mã vé: {!! $value['code'] !!}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="text-center">
                                <img style="width: 100px" alt="QR code" src="data:image/png;base64,{{ DNS2D::getBarcodePNG($value->code.'',
                                'QRCODE') }}"/>
                            </div>
                            <div class="text-center">
                                #{!! $value['code'] !!}
                            </div>
                            <p>Ngày mua: {!! date("d/m/Y",strtotime($value['created_at']))!!}</p>
                            <span>Hình thức thanh toán: Ví VNPay </span>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xxs">Tên phim</th>
                                        <th class="text-center text-uppercase text-xxs">Suất chiếu</th>
                                        <th class="text-center text-uppercase text-xxs">Loại vé</th>
                                        <th class="text-center text-uppercase text-xxs">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle text-center">
                                            {!! $value['schedule']['movie']['name'] !!}
                                        </td>
                                        <td class="align-middle text-center">
                                            <strong>{!! $value['schedule']['room']['theater']['name'] !!}</strong>
                                            <p>{!! $value['schedule']['room']['name'] !!}</p>
                                            <p>Ghế: @foreach($value['ticketSeats'] as $seat)
                                                    @if ($loop->first)
                                                        {{ $seat->row.$seat->col }}
                                                    @else
                                                        ,{{ $seat->row.$seat->col }}
                                                    @endif
                                                @endforeach</p>
                                            <p>{!! date("d/m/Y",strtotime($value['schedule']['date'] )) !!}</p>
                                            <p>Từ {!! date("H:i A",strtotime($value['schedule']['startTime'] )) !!} ~ Đến {!! date("H:i A",strtotime($value['schedule']['endTime'] )) !!}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                           <p> {!! $value['schedule']['room']['roomType']['name'] !!}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p>{!! number_format($value['totalPrice'],0,",",".") !!}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


