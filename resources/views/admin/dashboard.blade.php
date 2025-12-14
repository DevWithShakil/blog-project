@extends('admin.layout')

@section('content')

    <style>
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            text-align: center;
            border: 1px solid #eee;
        }
        .card h3 {
            margin: 0;
            font-size: 1.2em;
            color: #777;
        }
        .card .number {
            font-size: 3em;
            font-weight: bold;
            color: #007bff;
            margin: 10px 0;
        }
        .card .btn-link {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #555;
            border: 1px solid #ddd;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9em;
            transition: 0.3s;
        }
        .card .btn-link:hover {
            background: #007bff;
            color: white;
            border-color: #007bff;
        }
        .welcome-msg {
            background: #e3f2fd;
            color: #0d47a1;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>

    <div class="welcome-msg">
        <h2>Welcome Back, {{ Auth::user()->name }}! 👋</h2>
        <p>You are logged in to the Admin Panel.</p>
    </div>

    <div class="dashboard-grid">

        <div class="card">
            <h3>Total Categories</h3>
            <div class="number">{{ $totalCategories }}</div>
            <a href="{{ route('categories.index') }}" class="btn-link">Manage Categories &rarr;</a>
        </div>

        <div class="card">
            <h3>Total Posts</h3>
            <div class="number">{{ $totalPosts }}</div>
            <a href="{{ route('posts.index') }}" class="btn-link">Manage Posts &rarr;</a>
        </div>

    </div>

    <div style="margin-top: 40px;">
        <h3>Quick Actions</h3>
        <a href="{{ route('posts.create') }}" class="btn btn-primary" style="margin-right: 10px;">+ Write New Post</a>
        <a href="{{ route('categories.create') }}" class="btn btn-primary" style="background: #28a745;">+ Add Category</a>
    </div>

@endsection
