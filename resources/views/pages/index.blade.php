@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách phòng</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        @foreach ($rooms as $room)
            <div class="col-md-3 mb-4">
                <div
                    class="card shadow text-center p-3 {{ $room->orders()->where('checkout_at', null)->get()->count() > 0? 'text-white bg-warning': 'text-white bg-success' }}">
                    {{ $room->type->name }}
                    <a href="{{ route('rooms.show', $room->id) }}" class="text-white">
                        <h3>{{ $room->name }}</h3>
                    </a>
                    {{ $room->orders()->where('checkout_at', null)->get()->count() > 0? 'Phòng đang thuê': 'Phòng trống' }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
