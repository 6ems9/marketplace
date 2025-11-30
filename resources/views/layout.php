<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marketplace UMKM</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="navbar">
        <div class="container">
            <a class="brand" href="/">Marketplace UMKM</a>
            <nav>
                <a class="nav-link" href="/">Produk</a>
                <a class="nav-button" href="/product/create">Tambah Produk</a>
            </nav>
        </div>
    </header>

    <main class="container content">
        <?php echo $content ?? ''; ?>
    </main>

    <footer class="footer">
        <div class="container">
            <p>Contoh marketplace ringan berbasis PHP 7 tanpa database berat.</p>
        </div>
    </footer>
</body>
</html>
