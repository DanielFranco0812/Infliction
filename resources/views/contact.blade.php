@extends('layouts.app')

@section('title', 'Infliction | Contact')

@section('content')
<nav>
    <h1>Infliction<span>.</span></h1>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('classes') }}">Classes</a></li>
        <li><a href="{{ route('equipment') }}">Equipment</a></li>
        <li><a href="{{ route('membership') }}">Memberships</a></li>
        <li><a href="{{ route('contact') }}" class="active">Contact</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    </ul>
</nav>

<div class="container">
    <h2 class="section-title fade-in">Get In <span>Touch</span></h2>
    <div class="contact-wrapper">
        <div class="contact-info fade-in">
            <h3>Visit Us</h3>
            <br>
            <p><strong>Address:</strong> Magalang Plaza, Philippines</p>
            <p><strong>Phone:</strong> (044) 766-0000 / +63 917 123 4567</p>
            <p><strong>Email:</strong> support@inflictiongym.ph</p>
            <br><br>
            <h3>Staffed Hours</h3>
            <br>
            <p>Monday - Sunday: 6:00 AM - 12:00 AM</p>
            <p style="color: #e31837;"><i>Members have 24/7 keycard access.</i></p>
        </div>
        <div class="contact-form fade-in">
            <form onsubmit="event.preventDefault(); alert('Message Sent Successfully!');">
                <input type="text" placeholder="Your Name" required>
                <input type="email" placeholder="Your Email" required>
                <textarea rows="5" placeholder="Your Message" required></textarea>
                <button type="submit" class="btn">Send Message</button>
            </form>
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
