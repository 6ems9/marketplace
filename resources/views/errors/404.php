<?php ob_start(); ?>
<section class="card">
    <h1>Halaman tidak ditemukan</h1>
    <p>Kami tidak menemukan halaman <strong><?php echo htmlspecialchars($path, ENT_QUOTES, 'UTF-8'); ?></strong>.</p>
    <a class="button" href="/">Kembali ke beranda</a>
</section>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>
