@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa dịch vụ</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('services.update', $service->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tên dịch vụ</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên dịch vụ"
                            value="{{ $service->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Đơn giá</label>
                        <input type="number" class="form-control" name="phone" placeholder="Nhập đơn giá"
                            value="{{ $service->price }}">
                    </div>
                    <img src="{{asset('storage/' . $service->image_url)}}" alt="" height="200">
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
