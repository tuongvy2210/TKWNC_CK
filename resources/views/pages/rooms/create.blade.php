@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Thêm phòng mới</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('rooms.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tên phòng</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên phòng">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Giá tiền</label>
                        <input type="text" class="form-control" name="price" placeholder="Nhập giá tiền">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Chọn loại phòng</label>
                        <select name="type_id" id="" class="form-control">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                </form>
            </div>
        </div>
    </div>
@endsection
