@extends('layout.app')

@section('content')
<h1 class="text-center">Edit User '{{ $user->name }}'</h1>
<div class="card text-dark bg-light mb-3 col-6 offset-3">
    <div class="card-body">
        <form method="post" action="/user/{{ $user->id }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
