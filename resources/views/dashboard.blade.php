<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athena AI | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <h1>Athena<span>AI</span></h1>
        <ul>
            <li><a href="{{ route('dashboard') }}" class="active">Dashboard</a></li>
            <li><a href="{{ route('faqs') }}">FAQs</a></li>
            <li><a href="{{ route('leads') }}">Leads</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="link-button">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h2 class="section-title">Business <span>Overview</span></h2>

        <div class="stat-grid">
            <div class="card stat-card">
                <h3>Total Leads</h3>
                <div class="stat-number">{{ $leadCount }}</div>
            </div>
            <div class="card stat-card">
                <h3>Website Inquiries</h3>
                <div class="stat-number">{{ $inquiryCount }}</div>
            </div>
            <div class="card stat-card">
                <h3>FAQs Stored</h3>
                <div class="stat-number">{{ $faqCount }}</div>
            </div>
        </div>

        <div class="card table-card">
            <h3>Recent Leads</h3>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Source</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentLeads as $lead)
                        <tr>
                            <td>{{ $lead->name }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ $lead->source }}</td>
                            <td>{{ $lead->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
