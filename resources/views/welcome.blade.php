@extends('layout.app')

@section('content')
<!-- I tried seperating the Registration and Login-pages to indivdual pages, but -->
<!-- Ich hab funktionstechnisch nix verändern können ihr Beispiel war perfekt. Deswegen habe ich mich Designstechnisch kreativ ausgelassen, ich hoffe das reicht Ihnen an Unterschied,-->
<h1 class="text-center">Forum</h1>
<div class="card text-dark bg-light mb-3 col-6">
    <div class="card-body unicorn">
        <h2 class="card-title">Login</h2>
        <form method="post" action="/login">
            @csrf
            <div class="mb-3">
                <label for="email-login" class="form-label">Email</label>
                <input type="email" class="form-control" id="email-login" name="email">
            </div>
            <div class="mb-3">
                <label for="password-login" class="form-label">Password</label>
                <input type="password" class="form-control" id="password-login" name="password">
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary btn-pink btn-lg">Login</button>
            </div>
        </form>
    </div>
</div>
<div class="card text-dark bg-light mb-3 col-6">
    <div class="card-body unicorn">
        <h2 class="card-title">Registration Form</h2>
        <form method="post" action="/register">
            @csrf
            <div class="mb-3">
                <label for="name-register" class="form-label">Name</label>
                <input type="text" class="form-control unicorn-textfield" id="name-register" name="name">
            </div>
            <div class="mb-3">
                <label for="email-register" class="form-label">Email</label>
                <input type="email" class="form-control" id="email-register" name="email">
            </div>
            <div class="mb-3">
                <label for="password-register" class="form-label">Password</label>
                <input type="password" class="form-control" id="password-register" name="password">
            </div>
            <div class="mb-3">
                <label for="password-confirmation" class="form-label">Password Confirmation</label>
                <input type="password" class="form-control" id="password-confirmation" name="password_confirmation">
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary btn-pink btn-lg">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
