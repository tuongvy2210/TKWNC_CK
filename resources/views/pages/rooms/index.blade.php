@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý phòng</h6>
            <a href="{{ route('rooms.create') }}" class="btn btn-primary">Thêm phòng mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Loại phòng</th>
                            <th>Giá tiền</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $index => $room)
                            <tr>
                                <td>{{ $room->id }}</td>
                                <td>{{ $room->name }}</td>
                                <td>{{ $room->type->name }}</td>
                                <td>{{ number_format($room->price) }}</td>
                                <td>{{ $room->created_at }}</td>
                                <td>
                                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning">Sửa</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete-{{ $room->id }}">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $rooms->links() }}
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @foreach ($rooms as $room)
        <!-- Logout Modal-->
        <div class="modal fade" id="delete-{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('rooms.destroy', $room->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xóa phòng</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Bạn có muốn xóa phòng không?</div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Đồng ý</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endpush
