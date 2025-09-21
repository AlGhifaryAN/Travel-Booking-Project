@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div style="max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
    <h2 style="text-align:center; margin-bottom:20px;">Login</h2>

    @if(session('error'))
        <div style="color:red; margin-bottom:10px;">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required style="width:100%; padding:8px; margin-top:5px;">
            @error('email')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required style="width:100%; padding:8px; margin-top:5px;">
            @error('password')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" style="width:100%; padding:10px; background-color:#007BFF; color:white; border:none; border-radius:4px;">
            Login
        </button>
    </form>
</div>
@endsection
