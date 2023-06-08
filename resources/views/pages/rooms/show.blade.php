@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">{{ $room->name }}</h6>
        </div>
        <div class="card-body">
            @if ($room->orders()->where('checkout_at', null)->get()->count() > 0)
                <form action="{{ route('orders.checkout',$room->orders()->where('checkout_at', null)->first()->id) }}"
                    method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Khách</label>
                                <p>{{ $room->orders()->where('checkout_at', null)->first()->customer->fullname }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Giờ thuê</label>
                                <p>{{ $room->orders()->where('checkout_at', null)->first()->created_at }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Giá tiền một giờ</label>
                                <p>{{ number_format($room->price) }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Số giờ thuê</label>
                                <p>{{ $rent_hours }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Tổng tiền thuê</label>
                                <p>{{ number_format($total) }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Tổng tiền phải trả</label>
                                <p>{{ number_format($total_payment) }}</p>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="total" value="{{ $total_payment }}">
                    <input type="hidden" name="checkout_at" value="{{ now() }}">
                    <input type="hidden" name="rent_hours" value="{{ $rent_hours }}">
                    <button type="submit" class="btn btn-primary">Khách trả phòng</button>
                </form>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <form
                            action="{{ route('orders.service',$room->orders()->where('checkout_at', null)->first()->id) }}"
                            method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Chọn dịch vụ</label>
                                        <select name="service_id" id="" class="form-control">
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Nhập số lượng</label>
                                        <input type="number" name="quantity" class="form-control" value="1">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu dịch vụ</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Hình ảnh</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </thead>
                            <tbody>
                                @foreach ($room->orders()->where('checkout_at', null)->first()->order_details as $index => $order_detail)
                                    <tr>
                                        <td>{{ $order_detail->id }}</td>
                                        <td>{{ $order_detail->service->name }}</td>
                                        <td><img src="{{ asset('storage/' . $order_detail->service->image_url) }}"
                                                alt="" height="100"></td>
                                        <td>{{ number_format($order_detail->service->price) }}</td>
                                        <td>{{ $order_detail->quantity }}</td>
                                        <td>{{ number_format($order_detail->service->price * $order_detail->quantity) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <form action="{{ route('orders.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Chọn khách</label>
                        <select name="customer_id" id="" class="form-control">
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->fullname }} -
                                    {{ $customer->phone }}
                                    -
                                    {{ $customer->address }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                </form>
            @endif
        </div>
    </div>
@endsection
