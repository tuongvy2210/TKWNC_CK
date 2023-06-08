@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Thêm khách hàng mới</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('customers.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tên khách hàng</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Nhập tên khách hàng">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                </form>
            </div>
        </div>
    </div>
@endsection
