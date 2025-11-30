<?php ob_start(); ?>
<section class="page-header">
    <div>
        <p class="eyebrow">Katalog UMKM</p>
        <h1>Temukan produk favoritmu</h1>
        <p>Marketplace sederhana yang bisa dijalankan dengan PHP 7 tanpa konfigurasi rumit.</p>
    </div>
    <div>
        <a class="button" href="/product/create">Tambah produk baru</a>
    </div>
</section>

<div class="grid">
    <?php foreach ($products as $product): ?>
        <article class="card">
            <?php if (!empty($product['image'])): ?>
                <div class="card__media" style="background-image:url('<?php echo htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8'); ?>')"></div>
            <?php endif; ?>
            <div class="card__body">
                <p class="eyebrow">Stok <?php echo (int) $product['stock']; ?> pcs</p>
                <h2>
                    <a href="/product/<?php echo htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </h2>
                <p class="muted">Rp <?php echo number_format((float) $product['price'], 0, ',', '.'); ?></p>
            </div>
        </article>
    <?php endforeach; ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>
