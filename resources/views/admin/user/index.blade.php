@extends('admin.layouts.admin')

@section('title', 'User management')

@section('content')
    <div class="content-wrapper" style="min-height: 217.4px;">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Nick name</th>
                <th scope="col">Email</th>
                <th scope="col">Region</th>
                <th scope="col">Role</th>
                <th scope="col">Avatar</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->region }}</td>
                    <td>{{ $item->getRoleName($item->role) }}</td>
                    <td>
                        <img width="50px" style="border-radius: 50%" src="{{ url('storage/' . $item->avatar) }}">
                    </td>
                    <td>
                        <a href="{{ route('admin.user.show', $item->id) }}">
                            <img src="{{ asset('img/view.png') }}">
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.user.edit', $item->id) }}">
                            <img src="{{ asset('img/edit.png') }}">
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.user.delete', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: none">
                                <img src="{{ asset('img/delete.png') }}">
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
