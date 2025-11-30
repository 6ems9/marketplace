# Marketplace UMKM (PHP 7 friendly)

Proyek contoh marketplace ringan dengan gaya Laravel, ditulis untuk berjalan di PHP 7 tanpa database berat. Data produk disimpan dalam berkas JSON di folder `storage/` sehingga dapat dijalankan langsung.

## Menjalankan aplikasi

1. Pastikan PHP minimal versi 7.3 terpasang.
2. Instal autoloader:

   ```bash
   composer install
   composer dump-autoload
   ```

   (Tidak ada dependensi eksternal sehingga proses ini hanya menyiapkan autoload.)
3. Jalankan server bawaan PHP:

   ```bash
   php -S localhost:8000 -t public
   ```

4. Buka `http://localhost:8000` di browser. Anda bisa menambah produk baru lewat tombol **Tambah Produk**.

## Struktur singkat

- `public/index.php` – titik masuk aplikasi dan router sederhana.
- `app/Controllers` – logika untuk katalog dan penambahan produk.
- `app/Models/Product.php` – pengelola data berbasis JSON.
- `resources/views` – template antarmuka.
- `storage/products.json` – data produk seed yang dapat langsung digunakan.

## Catatan kompatibilitas

- Kode menggunakan fitur PHP 7 (type hinting, `declare(strict_types=1)`), dan tidak membutuhkan ekstensi tambahan.
- Jika ingin menggunakan database lain, Anda bisa mengganti implementasi `App\Models\Product` sesuai kebutuhan.
