@extends('layouts.app')

@section('title', 'Infliction | Register')

@section('content')
<nav>
    <h1>Infliction<span>.</span></h1>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('classes') }}">Classes</a></li>
        <li><a href="{{ route('equipment') }}">Equipment</a></li>
        <li><a href="{{ route('membership') }}">Memberships</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('register') }}" class="active">Register</a></li>
    </ul>
</nav>

<div class="container">
    <div class="contact-wrapper">
        <div class="contact-info fade-in">
            <h2>Start Your Fitness Journey</h2>
            <p>Join Infliction and take the first step toward a stronger, healthier lifestyle.</p>
            <br>
            <p><strong>Why members choose us:</strong></p>
            <p>✓ 24/7 access</p>
            <p>✓ Certified coaches</p>
            <p>✓ Premium training equipment</p>
        </div>

        <div class="contact-form fade-in">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <button type="submit" class="btn">Create Account</button>
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
