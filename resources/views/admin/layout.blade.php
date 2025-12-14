<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body { display: flex; font-family: sans-serif; margin: 0; }
        .sidebar { width: 250px; background: #333; color: white; height: 100vh; padding: 20px; }
        .sidebar a { display: block; color: white; padding: 10px; text-decoration: none; margin-bottom: 5px; }
        .sidebar a:hover { background: #555; }
        .content { flex: 1; padding: 20px; }
        .success { background: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;}
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 4px; color: white; font-size: 14px;}
        .btn-primary { background: #007bff; }
        .btn-danger { background: #dc3545; border: none; cursor: pointer;}
        .btn-edit { background: #ffc107; color: black; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h3>Admin Panel</h3>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('categories.index') }}">Manage Categories</a>
        <a href="{{ route('posts.index') }}">Manage Posts</a>
            @csrf
            <button type="submit" class="btn btn-danger" style="width: 100%;">Logout</button>
        </form>
    </div>

    <div class="content">
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

</body>
</html>
