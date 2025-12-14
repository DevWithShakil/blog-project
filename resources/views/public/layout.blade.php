<!DOCTYPE html>
<html>
<head>
    <title>My Simple Blog</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; padding: 0; background: #f9f9f9; color: #333; }

        /* Navbar */
        nav { background: white; padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        nav a { text-decoration: none; color: #333; margin-left: 20px; font-weight: bold; }
        nav .logo { font-size: 24px; color: #007bff; }
        nav a:hover { color: #007bff; }

        /* Container */
        .container { max-width: 1000px; margin: 30px auto; padding: 0 20px; }

        /* Cards */
        .post-card { background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); transition: 0.3s; }
        .post-card:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .post-meta { font-size: 0.9em; color: #777; margin-bottom: 10px; }
        .category-badge { background: #eef2ff; color: #007bff; padding: 3px 8px; border-radius: 4px; font-size: 0.8em; text-decoration: none; }

        /* Buttons */
        .btn-read { display: inline-block; margin-top: 10px; padding: 8px 15px; background: #333; color: white; text-decoration: none; border-radius: 4px; }
        .btn-read:hover { background: #555; }

        /* Category List in Home */
        .cat-list { display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 30px; justify-content: center; }
        .cat-btn { padding: 10px 20px; background: white; border: 1px solid #ddd; border-radius: 20px; text-decoration: none; color: #333; }
        .cat-btn:hover { background: #007bff; color: white; border-color: #007bff; }

        .hero { text-align: center; padding: 50px 20px; background: #fff; margin-bottom: 30px; border-radius: 8px; }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('home') }}" class="logo">MyBlog</a>
        <div>
            <a href="{{ route('home') }}">Home</a>
            @auth
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
