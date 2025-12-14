# Simple Category-wise Blog with Admin Panel

## 📝 Project Description

This is a dynamic blog application built using **Laravel** and **PostgreSQL**. It features a public frontend for visitors to read blogs and filter them by category. It includes a secure **Admin Panel** for managing categories and posts.

**Key Highlight:** The authentication system (Login/Register) is built manually using custom Controllers and Middleware. The Admin Panel is protected by custom Middleware.

---

## ✅ Assignment Requirements Fulfilled

-   [x] **Framework:** Laravel 11/12 used.
-   [x] **Database:** PostgreSQL used with Eloquent ORM.
-   [x] **Public Site:** Home page, Single Post details, and Category-wise filtering.
-   [x] **Admin Panel:** Dashboard, Category Management (CRUD), Post Management (CRUD).
-   [x] **Security:** Admin routes protected by Custom Middleware.
-   [x] **Auth:** Custom Login & Registration system implemented.
-   [x] **Validation:** Proper Laravel form validation used.

---

## 🔗 Key Endpoints (Routes)

### 🌍 Public Routes (Visitors)

| Method | Endpoint           | Description                           |
| :----- | :----------------- | :------------------------------------ |
| `GET`  | `/`                | Home Page (Recent posts & Categories) |
| `GET`  | `/blog/{slug}`     | View Single Blog Details              |
| `GET`  | `/category/{slug}` | View Posts by specific Category       |

### 🔐 Authentication Routes

| Method | Endpoint    | Description            |
| :----- | :---------- | :--------------------- |
| `GET`  | `/login`    | Show Login Form        |
| `POST` | `/login`    | Process Login          |
| `GET`  | `/register` | Show Registration Form |
| `POST` | `/register` | Create New Admin User  |
| `POST` | `/logout`   | Logout User            |

### 🛡️ Admin Routes (Protected)

| Method | Endpoint                   | Description             |
| :----- | :------------------------- | :---------------------- |
| `GET`  | `/admin/dashboard`         | Admin Dashboard (Stats) |
| `GET`  | `/admin/categories`        | List all Categories     |
| `GET`  | `/admin/categories/create` | Create New Category     |
| `GET`  | `/admin/posts`             | List all Posts          |
| `GET`  | `/admin/posts/create`      | Create New Post         |

---

## 🗄️ Database Configuration (PostgreSQL)

Ensure your `.env` file is configured for PostgreSQL:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=blog_project_db
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

🚀 How to Run

1. Clone the project.
2. Run composer install.
3. Set up .env database credentials.
4. Run php artisan migrate.
5. Run php artisan serve.
