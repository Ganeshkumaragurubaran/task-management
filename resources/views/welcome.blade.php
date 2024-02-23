@extends('master')
@section('title', 'Home')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@section('content')
<div class="welcome-container">
      <div class="welcome-content">
        <h1>Welcome to the Task Management Hub</h1>
        <p>Your journey to organized productivity starts here. Join us and conquer your tasks effortlessly!</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
      </div>
    </div>
@endsection
