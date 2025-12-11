# 🌿 Empatha — Platform Kesehatan Mental Berbasis Web

**Empatha** adalah platform kesehatan mental berbasis Laravel yang dirancang untuk membantu pengguna melakukan refleksi diri, melacak suasana hati, dan membangun support system melalui komunitas online. Platform ini memberikan ruang aman dan interaktif untuk mendukung perjalanan kesehatan mental pengguna.

## Deskripsi Platform

Empatha menyediakan berbagai fitur untuk mendukung kesehatan mental, di antaranya:
- Menulis jurnal pribadi
- Melacak suasana hati dengan motivasi
- Berdiskusi dalam komunitas
- Membaca artikel self-care
- Menyimpan artikel favorit

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

## 🛠️ Instalasi & Setup

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

# Start local server
php artisan serve
```
## 🔑 Akun Login (Testing)

**Admin**  
- Email: `admin@example.com`  
- Password: `password`

**User**  
- Email: `test@example.com`  
- Password: `password`

---

## 🧭 Daftar Path / Routes

### 🌐 Public Routes
- `/` — Welcome page  
- `/login` — Login  
- `/register` — Registrasi  
- `/articles` — Daftar artikel  
- `/articles/{id}` — Detail artikel  

### 🔒 Authenticated Routes
- `/dashboard` — Dashboard  
- `/profile` — Profil pengguna  

#### 📓 Journals
- `/journals`  
- `/journals/create`  
- `/journals/{id}`  
- `/journals/{id}/edit`  

#### 😊 Mood Tracker
- `/moods` — Mood tracking & riwayat

#### 💬 Forum
- `/forum`  
- `/forum/create`  
- `/forum/{id}`  

#### ⭐ Bookmark
- `/bookmarks`  

### 🛠️ Admin Only Routes
- `/articles/create`  
- `/articles/{id}/edit`  

---

## 🗄️ Database Schema

### **Users**
- `id`, `name`, `email`, `password`, `role`

### **Journals**
- `id`, `user_id`, `title`, `content`, `mood_id`

### **Moods**
- `id`, `user_id`, `mood`, `score`, `note`

### **Forum Posts**
- `id`, `user_id`, `title`, `body`

### **Comments**
- `id`, `user_id`, `forum_post_id`, `body`

### **Self Care Articles**
- `id`, `title`, `body`, `author`, `published_at`

### **Bookmarks**
- `id`, `user_id`, `self_care_article_id`

---

## 🧰 Teknologi yang Digunakan

- **Backend:** Laravel 12  
- **Frontend:** Blade Templates, Tailwind CSS  
- **Database:** SQLite / MySQL  
- **Authentication:** Laravel Breeze  

---

## 🤝 Cara Berkontribusi

1. Fork repository  
2. Buat branch baru  
   ```bash
   git checkout -b feature/nama-fitur
   ```
3. Lakukan perubahan yang diperlukan, lalu commit:
   ```bash
   git commit -m "Tambah: deskripsi fitur atau perbaikan"
   ```
4. Push perubahan ke branch Anda:
   ```bash
   git push origin feature/nama-fitur
   ```
5. Buat Pull Request ke repository utama dan jelaskan perubahan yang Anda lakukan.
Kontribusi dalam bentuk fitur baru, perbaikan bug, dokumentasi, atau saran sangat diterima! 🙌
