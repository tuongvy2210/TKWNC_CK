@extends('layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý khách hàng</h6>
            <a href="{{ route('customers.create') }}" class="btn btn-primary">Thêm khách hàng mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên khách</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $index => $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->fullname }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->created_at }}</td>
                                <td>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Sửa</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete-{{ $customer->id }}">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @foreach ($customers as $customer)
        <!-- Logout Modal-->
        <div class="modal fade" id="delete-{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xóa khách hàng</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Bạn có muốn xóa khách hàng không?</div>
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
