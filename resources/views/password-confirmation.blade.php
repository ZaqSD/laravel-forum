@extends('layout.app')

@section('content')
<div class="col-12">
    <h1 class="text-center">Confirm Password</h1>
</div>
<div class="d-flex justify-content-center mt-5">
    <div class="card text-dark bg-light mb-3 col-6">
        <div class="card-body">
            <form method="post" action="/user/confirm-password">
                @csrf
                <div class="mb-3">
                    <label for="password-login" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password-login" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
