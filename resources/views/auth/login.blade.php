@extends('master')
@section('title', 'Login Page')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@section('content')
<div class="page-container">
    <div class="login-form">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email" class="smaller-text">Email:</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" class="input-field"/>
                <span class="error smaller-text">{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group">
                <label for="password" class="smaller-text">Password:</label>
                <input type="password" id="password" name="password" class="input-field"/>
                <span class="error smaller-text">{{ $errors->first('password') }}</span>
            </div>
            <button type="submit" class="submit-button">Submit</button>
        </form>

        <p>
            Sign up here
            <a href="{{ route('register') }}" class="active ml-1">Register</a>
        </p>
    </div>
</div>


@endsection
