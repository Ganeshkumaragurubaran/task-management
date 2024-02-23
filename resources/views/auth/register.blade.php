@extends('master')
@section('title', 'Register Page')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@section('content')
<div class="page-container">
    <div class="login-form">
        <h3>Register</h3>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email" class="smaller-text">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="input-field"/>
                <span class="error smaller-text">{{ $errors->first('name') }}</span>
            </div>
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
            <div class="form-group">
                <label for="password" class="smaller-text">Confirm Password:</label>
                <input type="password" id="password" name="password_confirmation" class="input-field"/>
                <span class="error smaller-text">{{ $errors->first('password_confirmation') }}</span>
            </div>
            <button type="submit" class="submit-button">Submit</button>
        </form>

        <p>
            Already Registered!
            <a href="{{ route('login') }}" class="active ml-1">Login here</a>
        </p>
    </div>
</div>


@endsection
