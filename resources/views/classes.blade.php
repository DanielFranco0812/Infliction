@extends('layouts.app')

@section('title', 'Infliction | Classes')

@section('content')
<nav>
    <h1>Infliction<span>.</span></h1>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('classes') }}" class="active">Classes</a></li>
        <li><a href="{{ route('equipment') }}">Equipment</a></li>
        <li><a href="{{ route('membership') }}">Memberships</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    </ul>
</nav>

<header class="classes-hero">
    <p class="fade-in" style="color: #e31837; font-weight: bold; letter-spacing: 2px; margin-bottom: 10px;">PHILIPPINES #1 GROUP FITNESS EXPERIENCE</p>
    <h2 class="fade-in">Join our community<br>with <span>2300+ classes</span></h2>
    <p class="fade-in" style="color: #ccc; max-width: 600px; margin-bottom: 30px;">From Yoga, Dance, HIIT, exclusive signature classes - immerse yourself in a diverse mix of experiences at Infliction.</p>
    <div class="fade-in" style="display: flex; gap: 20px;">
        <a href="{{ route('membership') }}" class="btn">Try A Class Free</a>
        <a href="#" class="btn" style="background: transparent; color: white;">View Timetable →</a>
    </div>
</header>

<div class="container">
    <h2 class="section-title fade-in">Progress Moves You.<br><span>Community Moves You Further.</span></h2>
    <p class="fade-in" style="max-width: 800px; margin: 0 auto; color: #aaa;">Group fitness classes give you the guidance to progress and a community that keeps you coming back.</p>

    <div class="image-grid fade-in" style="grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); margin-top: 60px;">
        <div class="image-card">
            <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?q=80&w=1470&auto=format&fit=crop" alt="Cardio">
            <div class="card-content">
                <h3>Cardio</h3>
                <p style="color: #e31837; font-weight: bold; cursor: pointer;">View classes →</p>
            </div>
        </div>
        <div class="image-card">
            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1470&auto=format&fit=crop" alt="Cycling">
            <div class="card-content">
                <h3>Cycling</h3>
                <p style="color: #e31837; font-weight: bold; cursor: pointer;">View classes →</p>
            </div>
        </div>
        <div class="image-card">
            <img src="https://images.unsplash.com/photo-1599058917212-d750089bc07e?q=80&w=1469&auto=format&fit=crop" alt="HIIT">
            <div class="card-content">
                <h3>HIIT</h3>
                <p style="color: #e31837; font-weight: bold; cursor: pointer;">View classes →</p>
            </div>
        </div>
        <div class="image-card">
            <img src="https://images.unsplash.com/photo-1524594152303-9fd13543fe6e?q=80&w=1470&auto=format&fit=crop" alt="Dance">
            <div class="card-content">
                <h3>Dance</h3>
                <p style="color: #e31837; font-weight: bold; cursor: pointer;">View classes →</p>
            </div>
        </div>
        <div class="image-card">
            <img src="https://images.unsplash.com/photo-1599901860904-17e6ed7083a0?q=80&w=1470&auto=format&fit=crop" alt="Mind & Body">
            <div class="card-content">
                <h3>Mind & Body</h3>
                <p style="color: #e31837; font-weight: bold; cursor: pointer;">View classes →</p>
            </div>
        </div>
        <div class="image-card">
            <img src="https://images.unsplash.com/photo-1534438097544-77e774900a6e?q=80&w=1470&auto=format&fit=crop" alt="Strength & Conditioning">
            <div class="card-content">
                <h3>Strength & Conditioning</h3>
                <p style="color: #e31837; font-weight: bold; cursor: pointer;">View classes →</p>
            </div>
        </div>
    </div>
</div>

<div class="chat-bubble" id="chat-bubble">💬</div>
<div class="chat-widget" id="chat-widget">
    <div class="chat-header"><span>Infliction Support</span><button id="close-chat-btn" class="close-chat-btn">&times;</button></div>
    <div class="chat-messages" id="chat-messages"><div class="message bot-msg">Welcome to Infliction Platinum. How can we assist you today?</div></div>
    <div class="chat-input-area"><input type="text" id="chat-input" placeholder="Type your message..."><button id="send-btn">Send</button></div>
</div>
@endsection
