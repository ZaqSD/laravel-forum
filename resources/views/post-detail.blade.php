@extends('layout.app')

@section('content')
<h1 class="text-center">
    @isset ($post)
    Edit Post #{{ $post->id }}
    @else
    Write new Post
    @endisset
</h1>
<form method="POST" @isset($post)action="/post/{{ $post->id }}" @else action="/post" @endisset>
    @csrf
    @isset($post)
    @method('PUT')
    @endisset
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" @isset($post)value="{{ $post->title }}" @endisset>
        @error('title')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" id="author" name="author" @isset($author)value="{{ $author->name }}" disabled @endisset>
        @error('title')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Text</label>
        <textarea class="form-control" id="content" name="content" rows="4">@isset($post){{ $post->content }}@endisset</textarea>
        @error('content')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
