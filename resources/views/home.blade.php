@extends('layout.app')

@section('content')
<div class="col-12">
    <h1 class="text-center">Forum!</h1>
</div>
<div class="d-grid gap-2">
    @if ($user->isMod == 'true')
    <div class="card">
        <div class=" card-body">
            <h2 class="card-title">Moderator Panel</h2>
            <a href="/user" class="btn btn-secondary">User Management</a>
        </div>
    </div>
    @endif
    <div class="card">
        <div class=" card-body">
            <h2 class="card-title">{{ $user->name }}</h2>
            @if ($user->isMod == 'true')
            <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
            @endif
            <a href="/user/{{ $user->id }}" class="btn btn-primary">Edit Profile</a>
            <a href="/post" class="btn btn-primary">My Posts</a>
            <a href="#" onclick="document.querySelector('#logout-form').submit()" class="btn btn-danger">Logout</a>
            <form method="post" action="/logout" id="logout-form">
                @csrf
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="list-group">
                <a href="/post/create" class="list-group-item list-group-item-action active btn btn-primary btn-lg text-center">Create new Post</a>
                @foreach($posts as $post)
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $post->title }}</h5>
                        <small>{{ $post->created_at }}</small>
                    </div>
                    <p class="mb-1"> {{ $post->content}} </p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
