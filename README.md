#### 0. Download & install [git](https://git-scm.com/)

#### 1. Clone
```
git clone https://github.com/mhnaufal/sistem-perpustakaan.git
```

atau

download manual as [zip](https://github.com/mhnaufal/sistem-perpustakaan/archive/refs/heads/main.zip)

#### 2. pindah ke direktori sistem-perpustakaan
```
cd sistem-perpustakaan
```

#### 3. Install composer dependencies
```
composer install
```

#### 4. Copy file .env.example dan kasih nama .env
Buat terlebih dahulu database dengan nama sistem-perpustakaan

```
cp .env.example .env
```

Edit konfigurasi di .env yang udah dibuat:
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=sistem-perpustakaan

In the example above we create a database called sistem-perpustakaan which runs on Localhost (127.0.0.1) port 3306

#### 5. Generate secret key buat laravel
```
php artisan key:generate
```

#### 6. Jalankan migrasi database
```
php artisan migrate
```

or (optional)

```
php artisan migrate:fresh --seed
```

#### 7. Jalankan Laravel
```
php artisan serve
```
