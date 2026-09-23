@extends('layouts.app')

@section('title', 'Infliction | Memberships')

@section('content')
<nav>
    <h1>Infliction<span>.</span></h1>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('classes') }}">Classes</a></li>
        <li><a href="{{ route('equipment') }}">Equipment</a></li>
        <li><a href="{{ route('membership') }}" class="active">Memberships</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    </ul>
</nav>

<div class="container">
    <h2 class="section-title fade-in">Choose Your <span>Plan</span></h2>
    <div class="grid">
        <div class="card fade-in">
            <h3>Basic Tier</h3>
            <div class="price">₱1,500<span style="font-size: 1rem; color: #aaa;">/mo</span></div>
            <p>✓ Full 24/7 gym access</p>
            <p>✓ Locker room & shower access</p>
            <p>✓ Free WiFi</p>
            <br>
            <a href="#" class="btn" style="width: 100%; text-align: center;">Select Basic</a>
        </div>
        <div class="card fade-in" style="border-top-color: #e31837;">
            <h3>Premium Tier</h3>
            <div class="price">₱2,500<span style="font-size: 1rem; color: #aaa;">/mo</span></div>
            <p>✓ Full 24/7 gym access</p>
            <p>✓ Unlimited group classes</p>
            <p>✓ 1 Free Personal Training Session/mo</p>
            <p>✓ Towel service</p>
            <br>
            <a href="#" class="btn" style="width: 100%; text-align: center;">Select Premium</a>
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
