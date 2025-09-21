# Travel Booking Project

Aplikasi **Travel Booking** berbasis Laravel untuk manajemen pemesanan perjalanan.  
Proyek ini mendukung autentikasi pengguna dengan **role-based access** (Admin & Passenger) dan fitur pemesanan sederhana.

## Tech Stack
- **PHP 8+**, **Laravel 10**
- MySQL / MariaDB
- Blade Template
- Composer

---

## Fitur Utama
- **Autentikasi & Role**
  - Login/Logout dengan CSRF protection.
  - Role **Admin** dan **Passenger**.
  - Middleware `IsAdmin` & `IsPassenger` untuk proteksi halaman.
- **Manajemen Pemesanan**
  - Relasi `users` → `bookings` (foreign key).
- **Seeder**
  - User seeder dengan akun default (admin & passenger).

---

## Persiapan & Instalasi
1. **Clone Repo**
   ```bash
   git clone https://github.com/<username>/travel-booking.git
   cd travel-booking
   ```
2. **Install Dependency**
   ```bash
   composer install
   npm install && npm run build   # jika pakai vite/asset
   ```
3. **Environment**
   - Salin `.env.example` → `.env` lalu sesuaikan database.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. **Database & Seeder**
   ```bash
   php artisan migrate
   php artisan db:seed --class=UserSeeder
   ```

---

## Akun Default
Gunakan akun ini untuk login awal:

| Role       | Email                 | Password |
|------------|-----------------------|---------|
| **Admin**  | admin@example.com     | password |
| Passenger  | passenger@example.com | password |

---

## Menjalankan Server
```bash
php artisan serve
```
Akses di: **http://127.0.0.1:8000/login**

---

## Kendala & Catatan Pengembangan

Selama pengembangan terdapat beberapa kendala utama:

1. **Duplicate Seeder Class**  
   - Error: `Cannot declare class UserSeeder, because the name is already in use`.  
   - Penyebab: File `UserSeeder.php` ganda/namespace bentrok.  
   - Solusi: Pastikan hanya ada **satu** file `UserSeeder` dan composer autoload dijalankan ulang.

2. **Foreign Key Constraint Saat Truncate**  
   - Error: `Cannot truncate a table referenced in a foreign key constraint (bookings_user_id_foreign)`.  
   - Solusi: Disable foreign key check di seeder atau pakai `DB::table('users')->delete();`.

3. **CSRF Token / Page Expired (419)**  
   - Muncul saat form login tidak memuat `@csrf`.  
   - Solusi: Pastikan setiap form POST menyertakan `@csrf`.

4. **Middleware Role Protection**  
   - Pastikan middleware (`IsAdmin`, `IsPassenger`, `RoleMiddleware`) terdaftar di `app/Http/Kernel.php` dan digunakan pada route yang sesuai.

5. **GitHub Deployment**  
   - Pastikan `.env` dan folder `vendor/` **tidak di-commit**.  
   - Cek `.gitignore` untuk keamanan.

---

## Lisensi
Proyek ini dirilis untuk tujuan pembelajaran. Silakan gunakan dan modifikasi sesuai kebutuhan.

---

**Author**  
Nama: *Al Ghifary Akmal Nasheeri*  
