@extends('admin.layouts.admin')

@section('title', 'User management')

@section('content')
    <div class="content-wrapper" style="min-height: 217.4px;">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Nickname: {{ $item->name }}</h1>
                <p class="col-md-8 fs-4 mt-3">Email: {{ $item->email }}</p>
                <p class="col-md-8 fs-4 mt-3">Region: {{ $item->region }}</p>
                <p class="col-md-8 fs-4 mt-3">Hobby: {{ $item->hobby->name }}</p>
                <p class="col-md-8 fs-4 mt-3">Bio link: <a href="{{ $item->link }}">{{ $item->link }}</a></p>
                <p class="col-md-8 fs-4 mt-3">Role: {{ $item->getRoleName($item->role) }}</p>
                <p class="col-md-8 fs-4 mt-3">Posts count: {{ $item->posts->count() }}</p>
                <p class="col-md-8 fs-4 mt-3">Subscribers: {{ $item->customers->count() }}</p>
                <a class="btn btn-primary btn-lg mt-3" href="{{ route('admin.user.index') }}">Back to users</a>
            </div>
        </div>
    </div>
@endsection
