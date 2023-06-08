@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý phiếu đặt phòng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Khách hàng</th>
                            <th>Phòng</th>
                            <th>Ngày thuê</th>
                            <th>Ngày trả</th>
                            <th>Số giờ thuê</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index => $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer->fullname }}</td>
                                <td>{{ $order->room->name }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->checkout_at }}</td>
                                <td>{{ $order->rent_hours }}</td>
                                <td>{{ number_format($order->total) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
