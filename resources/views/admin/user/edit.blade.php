@extends('admin.layouts.admin')

@section('title', 'Edit user')

@section('content')
    <div class="content-wrapper" style="min-height: 217.4px;">
        <form action="{{ route('admin.user.update', $item->id) }}" method="post" class="col-3">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <input type="hidden" name="user_id" class="form-control" value="{{ $item->id }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nickname</label>
                <input type="text" name="name" class="form-control" value="{{ $item->name }}">
                @error('name')
                <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" value="{{ $item->email }}">
                @error('email')
                <p style="color: #f00f00">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Role</label><br>
                <select name="role" class="form-select" aria-label="Default select example">
                    @foreach(\App\Models\User::ROLES as $key => $role)
                        <option {{ $item->role === $key ? 'selected' : '' }} value="{{ $key }}">{{ $role }}</option>
                    @endforeach
                </select><br>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save changes</button>
        </form>
    </div>
@endsection
