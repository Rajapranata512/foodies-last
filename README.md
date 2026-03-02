# Kripuk - Recipe Management App (Laravel 11)

Kripuk adalah aplikasi manajemen resep berbasis Laravel untuk membuat, melihat, mengedit, dan menghapus resep dengan autentikasi pengguna dan ownership data.

## Tech Stack
- PHP 8.2+
- Laravel 11
- MySQL / SQLite
- Blade + Bootstrap + Custom CSS
- PHPUnit (Feature Testing)

## Fitur Utama
- Autentikasi user: register, login, logout
- CRUD resep dengan upload gambar
- Ownership policy: hanya pemilik resep yang bisa edit/hapus
- Validasi terpusat via `FormRequest`
- Relasi data resep:
  - ingredients
  - steps
  - equipments
- Filter dan search resep
- CI pipeline (GitHub Actions)

## Struktur Kunci
- `app/Http/Controllers` - request handling
- `app/Http/Requests` - validation rules
- `app/Policies` - authorization rules
- `app/Models` - domain model & relationships
- `database/migrations` - schema + foreign key constraints
- `database/seeders` - demo data
- `tests/Feature` - integration behavior tests

## Setup Lokal
1. Install dependency
```bash
composer install
npm install
```

2. Copy env
```bash
cp .env.example .env
php artisan key:generate
```

3. Atur DB di `.env` (contoh MySQL):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projectwebprog
DB_USERNAME=root
DB_PASSWORD=YOUR_PASSWORD
```

4. Migration + seed
```bash
php artisan migrate:fresh --seed
php artisan storage:link
```

5. Jalankan server
```bash
php artisan serve --no-reload
```

## Akun Demo Seeder
- Email: `demo@kripuk.test`
- Password: `DemoPass123!`

## Testing
```bash
php artisan test
```

## Quality & CI
- Code style check: `php ./vendor/bin/pint --test`
- GitHub Actions workflow: `.github/workflows/ci.yml`

## Catatan Portofolio
Project ini sudah menampilkan hal-hal yang biasanya dilihat recruiter/engineering lead:
- separation of concerns (controller/request/policy)
- authorization berbasis ownership
- FK constraints + cascade delete
- test otomatis untuk auth & authorization flow
- dokumentasi setup yang jelas

## GitHub Auto-Deploy (InfinityFree)
Agar setiap `git push` ke branch `main` otomatis ter-deploy:

1. Buka GitHub repo -> `Settings` -> `Secrets and variables` -> `Actions` -> `New repository secret`.
2. Tambahkan secret berikut:
   - `INFINITYFREE_FTP_SERVER` (contoh: `ftpupload.net`)
   - `INFINITYFREE_FTP_USERNAME`
   - `INFINITYFREE_FTP_PASSWORD`
3. Pastikan file workflow ada di `.github/workflows/deploy-infinityfree.yml`.
4. Commit + push ke `main`.
5. Cek tab `Actions` untuk melihat status deploy.

Catatan penting:
- `.env` production tidak di-commit. Simpan `.env` langsung di server: `/htdocs/laravel_app/.env`.
- Workflow ini deploy app ke `/htdocs/laravel_app`, public assets ke `/htdocs`, dan otomatis overwrite `/htdocs/index.php` agar cocok dengan struktur InfinityFree.
