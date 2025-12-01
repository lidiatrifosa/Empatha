<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Redberry](https://redberry.international/laravel-development)**
-   **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Database Schema (Overview)

This project uses a relational database (MySQL/Postgres). Key tables created for the mental-health application:

-   **users**: default Laravel users table, now with `role` column (`user` or `admin`).
-   **journals**: personal journal entries, columns: `id`, `user_id` (FK -> users), `title`, `content`, `mood_id` (nullable FK -> moods), `timestamps`.
-   **moods**: mood tracker entries, columns: `id`, `user_id` (FK -> users), `mood`, `score`, `note`, `timestamps`.
-   **forum_posts**: community discussion posts, columns: `id`, `user_id` (FK -> users), `title`, `body`, `timestamps`.
-   **self_care_articles**: educational self-care content, columns: `id`, `title`, `body`, `author`, `published_at`, `timestamps`.

Relationships summary:

-   One `User` has many `Journal` entries and `Mood` entries.
-   A `Journal` may optionally reference a `Mood` entry.
-   Users can create `ForumPost` records (one-to-many).

Run migrations:

```powershell
Set-Location C:\Empatha\Empatha; php artisan migrate
php artisan db:seed
```

Create an admin user via seeder (already included): `AdminUserSeeder` creates `admin@example.com` / `password`.

MySQL configuration (example):

Set your `.env` values accordingly:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=empatha
DB_USERNAME=root
DB_PASSWORD=password
```

Then run migrations and seeder as shown above. If you'd like to use SQLite for quick local testing, set `DB_CONNECTION=sqlite` and create an empty database file.

To create the MySQL database quickly (Windows, MySQL CLI):
Implemented features
--------------------

- Authentication: register/login/forgot password/email verification (Breeze-like controllers included).
- Role-based auth: `user` and `admin` with `role` column on `users`.
- Journalling: CRUD for personal journals (`/journals`).
- Mood tracker: create/list mood entries (`/moods`).
- Forum discussions: create/list/show/delete posts (`/forum`).
- Self-care articles: list & show for all users; create/delete for admin (`/articles`).

Routes
------
- `/` — welcome
- `/dashboard` — dashboard (auth)
- `/journals` — Journals CRUD (auth)
- `/moods` — Mood tracker (auth)
- `/forum` — Forum (auth)
- `/articles` — Self-care articles (everyone can view; admin can create)

Notes
-----
- Laravel policies are not yet implemented; controllers use simple user ownership checks.
- The application expects a MySQL database; update `.env` accordingly.
- If MySQL is unavailable, you can switch to SQLite for quick local testing by setting `DB_CONNECTION=sqlite` in `.env`.


```powershell
# log in to mysql as root; this will prompt for password if set
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS empatha CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

If your MySQL server uses different credentials or ports, update `.env` accordingly before running `php artisan migrate`.
