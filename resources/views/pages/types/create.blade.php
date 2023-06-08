@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Thêm loại phòng mới</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('types.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tên loại phòng</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên loại phòng">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                </form>
            </div>
        </div>
    </div>
@endsection
