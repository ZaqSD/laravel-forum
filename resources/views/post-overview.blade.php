@extends('layout.app')

@section('content')
<h1 class="text-center">Post Overview</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Title</th>
            <th scope="col">Text</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $posts as $post )
        <tr>
            <th scope="row">{{ $post->created_at }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>
                <a href="/post/{{ $post->id }}" class="btn btn-warning">Edit</a>
                <a href="/post/delete/{{ $post->id }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
