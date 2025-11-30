<?php ob_start(); ?>
<article class="card">
    <?php if (!empty($product['image'])): ?>
        <div class="card__media" style="background-image:url('<?php echo htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8'); ?>')"></div>
    <?php endif; ?>
    <div class="card__body">
        <p class="eyebrow">ID <?php echo htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8'); ?></p>
        <h1><?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?></h1>
        <p class="muted">Rp <?php echo number_format((float) $product['price'], 0, ',', '.'); ?> · Stok <?php echo (int) $product['stock']; ?> pcs</p>
        <p><?php echo nl2br(htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8')); ?></p>
        <a class="button" href="/">Kembali ke katalog</a>
    </div>
</article>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>
