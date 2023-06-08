@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Thêm dịch vụ mới</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tên dịch vụ</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên dịch vụ">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Đơn giá</label>
                        <input type="text" class="form-control" name="price" placeholder="Nhập đơn giá">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Chọn hình ảnh</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                </form>
            </div>
        </div>
    </div>
@endsection
