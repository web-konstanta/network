@extends('admin.layouts.admin')

@section('title', 'Post management')

@section('content')
    <div class="content-wrapper" style="min-height: 217.4px;">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Post text</th>
                <th scope="col">User nick name</th>
                <th scope="col">Post image</th>
                <th scope="col">Post complains</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->text }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        <img
                            src="{{ url('storage/' . $post->image) }}"
                            style="width: 50px"
                        >
                    </td>
                    <td>{{ $post->complains->count() }}</td>
                    <td>
                        <a href="{{ route('admin.post.show', $post->id) }}">
                            <img src="{{ asset('img/view.png') }}">
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.post.approve', $post->id) }}" method="post">
                            @csrf
                            <button type="submit" style="border: none; background: none">
                                <img src="{{ asset('img/approve.png') }}">
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.post.destroy', $post->id) }}" method="post">
                            @csrf
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
