<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athena AI | Features</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <h1>Athena<span>AI</span></h1>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('features') }}" class="active">Features</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2 class="section-title">Problem <span>& Solution</span></h2>
        <div class="feature-grid">
            <div class="card">
                <h3>Problem</h3>
                <p>Business owners lose sales because of delayed responses to Facebook and website inquiries, especially during off-hours.</p>
            </div>
            <div class="card">
                <h3>Solution</h3>
                <p>Athena AI provides automated FAQ handling, lead qualification, and instant inquiry responses using cost-effective, free-tier integrations.</p>
            </div>
        </div>

        <h2 class="section-title" style="margin-top: 80px;">System Features</h2>
        <div class="feature-grid">
            <div class="card"><h3>Messenger Support</h3><p>Responds to Facebook Page DMs instantly.</p></div>
            <div class="card"><h3>Website Widget</h3><p>Simple chat box for collecting customer details.</p></div>
            <div class="card"><h3>Lead Capture</h3><p>Saves customer contacts and inquiry summaries in the database.</p></div>
            <div class="card"><h3>Knowledge Base</h3><p>Manage FAQs, prices, and store hours from a simple admin area.</p></div>
        </div>

        <h2 class="section-title" style="margin-top: 80px;">Free Tool Stack</h2>
        <div class="feature-list">
            <ul>
                <li><strong>Messaging Platform:</strong> Meta for Developers</li>
                <li><strong>AI Engine:</strong> Groq API / Hugging Face</li>
                <li><strong>Framework:</strong> Laravel</li>
                <li><strong>Database:</strong> MySQL</li>
                <li><strong>Webhook Tunnel:</strong> Ngrok / LocalTunnel</li>
                <li><strong>Hosting:</strong> Render / Railway / Supabase</li>
                <li><strong>Version Control:</strong> GitHub</li>
                <li><strong>API Testing:</strong> Postman</li>
            </ul>
        </div>
    </div>
</body>
</html>
