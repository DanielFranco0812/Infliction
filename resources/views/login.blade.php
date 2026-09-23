@extends('layouts.app')

@section('title', 'Infliction | Login')

@section('content')
<nav>
    <h1>Infliction<span>.</span></h1>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('classes') }}">Classes</a></li>
        <li><a href="{{ route('equipment') }}">Equipment</a></li>
        <li><a href="{{ route('membership') }}">Memberships</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('login') }}" class="active">Login</a></li>
    </ul>
</nav>

<div class="container">
    <div class="contact-wrapper">
        <div class="contact-info fade-in">
            <h2>Welcome Back</h2>
            <p>Access your Infliction account to manage your membership and training progress.</p>
        </div>

        <div class="contact-form fade-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn">Login</button>
            </form>
            @if ($errors->any())
                <div class="error-box" style="margin-top:14px;">
                    {{ $errors->first() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
