# Empatha - Platform Kesehatan Mental

Empatha adalah platform web berbasis Laravel yang dirancang untuk mendukung kesehatan mental pengguna melalui berbagai fitur interaktif dan edukatif.

## Deskripsi Platform

Platform kesehatan mental yang menyediakan ruang aman untuk:
- Menulis jurnal pribadi
- Melacak suasana hati dengan motivasi
- Berdiskusi dalam komunitas
- Membaca artikel self-care
- Menyimpan artikel favorit
- 

## Kegunaan

Platform ini berguna untuk:
- **Individu:** Self-reflection melalui journaling dan mood tracking
- **Komunitas:** Berbagi pengalaman dan saling mendukung
- **Edukasi:** Akses artikel kesehatan mental berkualitas
- **Monitoring:** Melacak perkembangan kesehatan mental
- **Support System:** Membangun jaringan dukungan mental

## Fitur Utama

### 🔐 Autentikasi & Role Management
- Registrasi dan login pengguna
- Role-based access (User & Admin)
- Password reset dan email verification

### 📝 Personal Journaling
- Tulis, edit, dan hapus jurnal pribadi
- Tampilan daftar jurnal dengan pencarian
- Jurnal hanya dapat diakses oleh pemilik

### 😊 Mood Tracker
- Catat suasana hati dengan skor 1-10
- Pilihan mood: Senang, Sedih, Cemas, Tenang, Marah, Bersemangat
- Motivational quotes otomatis berdasarkan mood
- Riwayat mood tracking

### 💬 Forum Komunitas
- Buat dan baca diskusi komunitas
- Sistem komentar pada setiap diskusi
- Hapus postingan sendiri atau sebagai admin

### 🌱 Self-Care Articles
- Baca artikel edukatif kesehatan mental
- Bookmark artikel favorit
- Admin dapat mengelola artikel (CRUD)

## Cara Penggunaan

### Setup Project
```bash
# Clone repository
git clone https://github.com/lidiatrifosa/Empatha.git
cd Empatha

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database
php artisan migrate
php artisan db:seed

# Build assets
npm run build

# Start server
php artisan serve
```

### Login Credentials
**Admin Account:**
- Email: `admin@example.com`
- Password: `password`

**Test User:**
- Email: `test@example.com`
- Password: `password`

## List Path/Routes

### Public Routes
- `/` - Halaman welcome
- `/login` - Halaman login
- `/register` - Halaman registrasi
- `/articles` - Daftar artikel self-care
- `/articles/{id}` - Detail artikel

### Authenticated Routes
- `/dashboard` - Dashboard utama
- `/profile` - Profil pengguna

#### Jurnal
- `/journals` - Daftar jurnal pribadi
- `/journals/create` - Buat jurnal baru
- `/journals/{id}` - Detail jurnal
- `/journals/{id}/edit` - Edit jurnal

#### Mood Tracker
- `/moods` - Mood tracker & riwayat

#### Forum
- `/forum` - Daftar diskusi forum
- `/forum/create` - Buat diskusi baru
- `/forum/{id}` - Detail diskusi & komentar

#### Bookmark
- `/bookmarks` - Artikel yang disimpan

### Admin Only Routes
- `/articles/create` - Buat artikel baru
- `/articles/{id}/edit` - Edit artikel

## Database Schema

### Users
- `id`, `name`, `email`, `password`, `role` (user/admin)

### Journals
- `id`, `user_id`, `title`, `content`, `mood_id`, `timestamps`

### Moods
- `id`, `user_id`, `mood`, `score`, `note`, `timestamps`

### Forum Posts
- `id`, `user_id`, `title`, `body`, `timestamps`

### Comments
- `id`, `user_id`, `forum_post_id`, `body`, `timestamps`

### Self Care Articles
- `id`, `title`, `body`, `author`, `published_at`, `timestamps`

### Bookmarks
- `id`, `user_id`, `self_care_article_id`, `timestamps`

## Teknologi

- **Backend:** Laravel 12
- **Frontend:** Blade Templates, Tailwind CSS
- **Database:** SQLite (default) / MySQL
- **Authentication:** Laravel Breeze

## Kontribusi

1. Fork repository
2. Buat branch fitur (`git checkout -b feature/nama-fitur`)
3. Commit perubahan (`git commit -m 'Tambah fitur'`)
4. Push ke branch (`git push origin feature/nama-fitur`)
5. Buat Pull Request
