<?php ob_start(); ?>
<section class="card">
    <h1>Tambah produk baru</h1>
    <p class="muted">Isi data sederhana, simpan, dan produk langsung tampil di katalog.</p>

    <form class="form" method="POST" action="/product">
        <label class="form__group">
            <span>Nama produk</span>
            <input type="text" name="name" required placeholder="Contoh: Kopi Gayo">
        </label>

        <label class="form__group">
            <span>Deskripsi</span>
            <textarea name="description" rows="4" required placeholder="Tuliskan detail singkat"></textarea>
        </label>

        <div class="form__grid">
            <label class="form__group">
                <span>Harga (Rp)</span>
                <input type="number" name="price" min="0" step="500" required value="0">
            </label>
            <label class="form__group">
                <span>Stok</span>
                <input type="number" name="stock" min="0" step="1" required value="1">
            </label>
        </div>

        <label class="form__group">
            <span>URL gambar (opsional)</span>
            <input type="url" name="image" placeholder="https://...">
        </label>

        <button class="button" type="submit">Simpan</button>
    </form>
</section>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>
