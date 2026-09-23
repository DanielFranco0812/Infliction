<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athena AI | Leads</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <h1>Athena<span>AI</span></h1>
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('faqs') }}">FAQs</a></li>
            <li><a href="{{ route('leads') }}" class="active">Leads</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="link-button">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h2 class="section-title">Captured <span>Leads</span></h2>

        <div class="card table-card">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Source</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leads as $lead)
                        <tr>
                            <td>{{ $lead->name }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ $lead->phone ?? 'N/A' }}</td>
                            <td>{{ $lead->company ?? 'N/A' }}</td>
                            <td>{{ $lead->source }}</td>
                            <td>{{ $lead->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $leads->links() }}
        </div>
    </div>
</body>
</html>
