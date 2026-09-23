<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athena AI | FAQs</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <h1>Athena<span>AI</span></h1>
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('faqs') }}" class="active">FAQs</a></li>
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
        <h2 class="section-title">Knowledge <span>Base</span></h2>

        <div class="card form-card">
            <h3>Add FAQ</h3>
            <form method="POST" action="{{ route('faqs.store') }}">
                @csrf
                <input type="text" name="question" placeholder="Question" required>
                <textarea name="answer" rows="4" placeholder="Answer" required></textarea>
                <input type="text" name="category" placeholder="Category" value="general" required>
                <button type="submit" class="btn">Save FAQ</button>
            </form>
        </div>

        <div class="card table-card">
            <h3>Saved FAQs</h3>
            <table>
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $faq)
                        <tr>
                            <td>{{ $faq->question }}</td>
                            <td>{{ $faq->answer }}</td>
                            <td>{{ $faq->category }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
