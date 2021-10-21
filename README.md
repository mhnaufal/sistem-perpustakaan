## Deployment 🚀

[siperpus](http://sisperpus.herokuapp.com/)

---

## Cara nge run

#### 0. Download & install [git](https://git-scm.com/). Buka cmd atau powershell atau terminal...

#### 1. Clone repository sistem-perpustakaan ini dengan cara
```console
git clone https://github.com/mhnaufal/sistem-perpustakaan.git
```

atau

download manual sebagai [zip](https://github.com/mhnaufal/sistem-perpustakaan/archive/refs/heads/main.zip) , tapi tidak direkomendasikan!

#### 2. pindah ke direktori sistem-perpustakaan
```console
cd sistem-perpustakaan
```

#### 3. Install composer dependencies
```console
composer install
```

#### 4. Copy file .env.example dan kasih nama .env
Buat terlebih dahulu database dengan nama sistem-perpustakaan

```console
cp .env.example .env
```

Kalau gak bisa pake perintah _cp_, copas manual aja file **.env.example**-nya kemudian kasih nama **.env** 

Edit konfigurasi di **.env** yang udah dibuat:
```yaml
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem-perpustakaan
```

In the example above we create a database called sistem-perpustakaan which runs on Localhost (127.0.0.1) port 3306

#### 5. Generate secret key buat laravel
```console
php artisan key:generate
```

#### 6. Jalankan migrasi database
```console
php artisan migrate:fresh --seed
```

or (optional)

```console
php artisan migrate
```

#### 7. Jalankan Laravel
```console
php artisan serve
```

## Cara kalau mau ngedit2

#### 1. Bikin branch sendiri
```console
git branch nama-branch
```

#### 2. Pindah ke branch yang barusan dibuat
```console
git switch nama-branch
```

#### 3. Lakukan pengeditan

#### 4. Setelah selesai, lakukan add dan commit
```console
git add .
```

```console
git commit -m "pesan habis ngedit apa ajaa"
```

#### 5. PUSH
```console
git push origin nama-branch
```

## Credits
Thanks to these beautiful templates:

- [Argon](https://www.creative-tim.com/product/argon-dashboard/?partner=49926)
- [SEOgram](https://www.free-css.com/free-css-templates/page271/seogram)
