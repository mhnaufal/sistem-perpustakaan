## Cara nge run

#### 0. Download & install [git](https://git-scm.com/). Buka cmd atau powershell atau terminal

#### 1. Clone repository sistem-perpustakaan ini dengan cara
```
git clone https://github.com/mhnaufal/sistem-perpustakaan.git
```

atau

download manual sebagai [zip](https://github.com/mhnaufal/sistem-perpustakaan/archive/refs/heads/main.zip) , tapi tidak direkomendasikan!

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

Kalau gak bisa pake perintah cp, copas manual aja file .env.example-nya, kasih nama .env 

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
php artisan migrate:fresh --seed
```

or (optional)

```
php artisan migrate
```

#### 7. Jalankan Laravel
```
php artisan serve
```
