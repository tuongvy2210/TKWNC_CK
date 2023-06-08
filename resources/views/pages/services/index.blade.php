@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý dịch vụ</h6>
            <a href="{{ route('services.create') }}" class="btn btn-primary">Thêm dịch vụ mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Đơn giá</th>
                            <th>Hình ảnh</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $index => $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->price }}</td>
                                <td><img src="{{ asset('storage/' . $service->image_url) }}" alt="" height="100"></td>
                                <td>{{ $service->created_at }}</td>
                                <td>
                                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Sửa</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete-{{ $service->id }}">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $services->links() }}
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @foreach ($services as $service)
        <!-- Logout Modal-->
        <div class="modal fade" id="delete-{{ $service->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('services.destroy', $service->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xóa dịch vụ</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Bạn có muốn xóa dịch vụ không?</div>
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
