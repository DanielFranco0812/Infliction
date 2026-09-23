@extends('layouts.app')

@section('title', 'Infliction | Equipment')

@section('content')
<nav>
    <h1>Infliction<span>.</span></h1>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('equipment') }}" class="active">Equipment</a></li>
        <li><a href="{{ route('membership') }}">Memberships</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    </ul>
</nav>

<div class="container">
    <h2 class="section-title fade-in">World-Class <span>Equipment</span></h2>
    <div class="grid">
        <div class="card fade-in">
            <h3>Cardio Zone</h3>
            <p>Latest treadmills, ellipticals, and stair climbers with built-in screens and heart rate monitoring.</p>
        </div>
        <div class="card fade-in">
            <h3>Free Weights</h3>
            <p>Dumbbells up to 150lbs, multiple Olympic squat racks, and heavy-duty deadlift platforms.</p>
        </div>
        <div class="card fade-in">
            <h3>Machine Weights</h3>
            <p>Premium pin-loaded and plate-loaded machines designed for safe, biomechanically correct muscle isolation.</p>
        </div>
    </div>
</div>

<div class="chat-bubble" id="chat-bubble">💬</div>
<div class="chat-widget" id="chat-widget">
    <div class="chat-header">
        <span>Infliction Support</span>
        <button id="close-chat-btn" class="close-chat-btn">&times;</button>
    </div>
    <div class="chat-messages" id="chat-messages">
        <div class="message bot-msg">Welcome to Infliction Platinum. How can we assist you today?</div>
    </div>
    <div class="chat-input-area">
        <input type="text" id="chat-input" placeholder="Type your message...">
        <button id="send-btn">Send</button>
    </div>
</div>
@endsection
