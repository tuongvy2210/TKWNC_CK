@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa khách hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('customers.update', $customer->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tên khách hàng</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Nhập tên khách hàng"
                            value="{{ $customer->fullname }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại"
                            value="{{ $customer->phone }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ"
                            value="{{ $customer->address }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                </form>
            </div>
        </div>
    </div>
@endsection
