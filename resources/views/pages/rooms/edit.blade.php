@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa phòng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('rooms.update', $room->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tên phòng</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên phòng"
                            value="{{ $room->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Giá tiền</label>
                        <input type="text" class="form-control" name="price" placeholder="Nhập giá tiền"
                            value="{{ $room->price }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Chọn loại phòng</label>
                        <select name="type_id" id="" class="form-control">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $type->id === $room->type->id ? 'selected' : '' }}>
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                </form>
            </div>
        </div>
    </div>
@endsection
