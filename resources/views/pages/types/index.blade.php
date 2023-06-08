@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý loại phòng</h6>
            <a href="{{ route('types.create') }}" class="btn btn-primary">Thêm loại phòng mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $index => $type)
                            <tr>
                                <td>{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->created_at }}</td>
                                <td>
                                    <a href="{{ route('types.edit', $type->id) }}" class="btn btn-warning">Sửa</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete-{{ $type->id }}">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $types->links() }}
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @foreach ($types as $type)
        <!-- Logout Modal-->
        <div class="modal fade" id="delete-{{ $type->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('types.destroy', $type->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xóa loại phòng</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Bạn có muốn xóa loại phòng không?</div>
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
