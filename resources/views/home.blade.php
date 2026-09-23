@extends('layouts.app')

@section('title', 'Infliction | Home')

@section('content')
<nav>
    <h1>Infliction<span>.</span></h1>
    <ul>
        <li><a href="{{ route('home') }}" class="active">Home</a></li>
        <li><a href="{{ route('classes') }}">Classes</a></li>
        <li><a href="{{ route('equipment') }}">Equipment</a></li>
        <li><a href="{{ route('membership') }}">Memberships</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    </ul>
</nav>

<header class="hero">
    <h2 class="fade-in">Go further.<br><span>Go faster.</span></h2>
    <p class="fade-in">Premium facilities, expert trainers, and a supportive community in Baliwag. Start your fitness journey today.</p>
    <a href="{{ route('membership') }}" class="btn fade-in">Join Now</a>
</header>

<div class="container">
    <h2 class="section-title fade-in">Reach Your <span>Fitness Goals</span></h2>
    <p class="fade-in" style="color: #aaa;">Here's how our Certified Fitness Coaches can help you get stronger and healthier.</p>
    <div class="image-grid fade-in">
        <div class="image-card">
            <img src="https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?q=80&w=1470&auto=format&fit=crop" alt="Leaner">
            <div class="card-content">
                <h3>Leaner</h3>
                <p>Sculpt a defined, leaner, and toner you based on your body goals and ideal body composition.</p>
            </div>
        </div>
        <div class="image-card">
            <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=1520&auto=format&fit=crop" alt="Well-Being">
            <div class="card-content">
                <h3>Well-Being</h3>
                <p>Empower yourself towards a healthier, happier you with our exercise and lifestyle coaching.</p>
            </div>
        </div>
        <div class="image-card">
            <img src="https://images.unsplash.com/photo-1554244933-d876deb6b2ff?q=80&w=1480&auto=format&fit=crop" alt="Athletic">
            <div class="card-content">
                <h3>Athletic</h3>
                <p>Achieve peak performance and prevent injuries with sport-specific training programmes.</p>
            </div>
        </div>
        <div class="image-card">
            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1470&auto=format&fit=crop" alt="Stronger">
            <div class="card-content">
                <h3>Stronger</h3>
                <p>Build muscles and increase functional strength for everyday tasks and activities you love.</p>
            </div>
        </div>
    </div>

    <div class="split-section fade-in">
        <div class="split-text">
            <h2>Your Success is <span style="color: #e31837;">Our Priority</span></h2>
            <p>That's why all our fitness coaches undergo rigorous in-house training and are certified. This ensures they possess the technical knowledge and coaching skills to guide you safely and effectively towards your fitness goals.</p>
            <p>Our in-house training and certification is recognized by the National Council on Strength & Fitness (NCSF).</p>
            <br>
            <a href="{{ route('contact') }}" class="btn">Book a Free Consultation</a>
        </div>
        <div class="split-image">
            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?q=80&w=1470&auto=format&fit=crop" alt="Personal Training">
        </div>
    </div>

    <div class="split-section fade-in" style="flex-direction: row-reverse;">
        <div class="split-text">
            <h2>Data-Driven <span style="color: #e31837;">Training & Results</span></h2>
            <p>We leverage insights from advanced body composition scanners and our custom My Coach app to tailor bespoke programmes, monitor your progress, and continuously reassess and realign your fitness plan.</p>
            <p>Expect expert guidance, motivation, and accountability to keep you on track.</p>
        </div>
        <div class="split-image">
            <img src="https://images.unsplash.com/photo-1526506114642-54eff16a0410?q=80&w=1470&auto=format&fit=crop" alt="Fitness App Tracking">
        </div>
    </div>

    <div class="split-section fade-in">
        <div class="split-text">
            <h2>Our <span style="color: #e31837;">Story</span></h2>
            <p>A venture that began decades ago is now evolving into the region's leading fitness standard. Today, we're inspiring communities across the country to a life of fitness while enjoying the perks of our world-class clubs.</p>
            <ul style="list-style: none; color: #aaa; margin-top: 15px;">
                <li style="margin-bottom: 10px;">✓ Wide variety of Group Exercises</li>
                <li style="margin-bottom: 10px;">✓ Access to Certified Personal Trainers</li>
                <li style="margin-bottom: 10px;">✓ Complete gym equipment and spacious workout areas</li>
            </ul>
        </div>
        <div class="split-image">
            <img src="https://images.unsplash.com/photo-1540497077202-7c8a3999166f?q=80&w=1470&auto=format&fit=crop" alt="Gym Community">
        </div>
    </div>

    <h2 class="section-title fade-in">Track Your <span>Progress</span></h2>
    <div class="grid">
        <div class="card bmi-widget fade-in">
            <h3>BMI Calculator</h3>
            <p style="margin-bottom: 15px; color: #aaa;">Find out your starting point before hitting the weights.</p>
            <div class="bmi-inputs">
                <input type="number" id="bmi-weight" placeholder="Weight (kg)">
                <input type="number" id="bmi-height" placeholder="Height (cm)">
            </div>
            <button onclick="calculateBMI()" class="btn" style="width: 100%; margin-top: 10px;">Calculate</button>
            <p id="bmi-result" style="margin-top: 15px; font-weight: bold;"></p>
        </div>
        <div class="card fade-in">
            <h3>Macro Tracking</h3>
            <p>Coming soon: Sync your MyFitnessPal data directly with your Infliction profile to stay on top of your nutrition.</p>
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
