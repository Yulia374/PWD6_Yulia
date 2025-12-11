<?php
require_once 'Database.php';
require_once 'Menu.php';

$database = new Database();
$db = $database->getConnection();

$menu = new Menu($db);

$stmt = $menu->getAllMenu();
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

$menuByKategori = [];
foreach ($menuItems as $item) {
    $menuByKategori[$item['kategori']][] = $item;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran Makanan Nusantara</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>🍽️ Restoran Makanan Nusantara</h1>
            <p>Nikmati Kelezatan Masakan Indonesia</p>
        </div>
    </header>

    <main class="container">
        <section class="intro">
            <h2>Selamat Datang!</h2>
            <p>Kami menyajikan berbagai menu makanan khas Indonesia dengan cita rasa autentik dan bahan-bahan pilihan.</p>
            <div style="margin-top: 20px;">
                <a href="tambah.php" class="btn btn-primary">➕ Tambah Menu Baru</a>
            </div>
        </section>

        <section class="menu-section">
            <?php foreach ($menuByKategori as $kategori => $items): ?>
                <div class="kategori-section">
                    <h2 class="kategori-title"><?php echo htmlspecialchars($kategori); ?></h2>
                    <div class="menu-grid">
                        <?php foreach ($items as $item): ?>
                            <div class="menu-card <?php echo $item['status'] == 'Habis' ? 'habis' : ''; ?>">
                                <div class="menu-icon">
                                    <?php 
                                    $icons = [
                                        'Makanan Utama' => '🍛',
                                        'Appetizer' => '🥟',
                                        'Dessert' => '🍨',
                                        'Minuman' => '🥤'
                                    ];
                                    echo $icons[$item['kategori']];
                                    ?>
                                </div>
                                <h3 class="menu-name"><?php echo htmlspecialchars($item['nama_makanan']); ?></h3>
                                <p class="menu-desc"><?php echo htmlspecialchars($item['deskripsi']); ?></p>
                                <div class="menu-footer">
                                    <span class="menu-price"><?php echo $menu->formatRupiah($item['harga']); ?></span>
                                    <span class="menu-status <?php echo strtolower($item['status']); ?>">
                                        <?php echo htmlspecialchars($item['status']); ?>
                                    </span>
                                </div>
                                <div class="menu-actions">
                                    <a href="ubah.php?id=<?php echo $item['id']; ?>" class="btn btn-warning">✏️ Ubah</a>
                                    <button onclick="confirmDelete(<?php echo $item['id']; ?>, '<?php echo htmlspecialchars($item['nama_makanan'], ENT_QUOTES); ?>')" class="btn btn-danger">🗑️ Hapus</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 Restoran Makanan Nusantara</p>
        </div>
    </footer>

    <script>
        function confirmDelete(id, nama) {
            if (confirm('Apakah Anda yakin ingin menghapus menu "' + nama + '"?')) {
                window.location.href = 'hapus.php?id=' + id;
            }
        }
    </script>
</body>
</html>s