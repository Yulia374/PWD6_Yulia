<?php
require_once 'Database.php';
require_once 'Menu.php';

$database = new Database();
$db = $database->getConnection();

$menu = new Menu($db);

$message = "";
$messageType = "";

// Get ID from URL
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID tidak ditemukan.');

// Get menu data
$menuData = $menu->getMenuById($id);

if(!$menuData) {
    die('ERROR: Menu tidak ditemukan.');
}

if($_POST) {
    $menu->id = $id;
    $menu->nama_makanan = $_POST['nama_makanan'];
    $menu->kategori = $_POST['kategori'];
    $menu->harga = $_POST['harga'];
    $menu->deskripsi = $_POST['deskripsi'];
    $menu->gambar = $_POST['gambar'];
    $menu->status = $_POST['status'];

    if($menu->update()) {
        $message = "Menu berhasil diupdate!";
        $messageType = "success";
        // Refresh data
        $menuData = $menu->getMenuById($id);
        // Redirect setelah 2 detik
        header("refresh:2;url=index.php");
    } else {
        $message = "Gagal mengupdate menu!";
        $messageType = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Menu - Restoran Makanan Nusantara</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>✏️ Ubah Menu</h1>
            <p>Restoran Makanan Nusantara</p>
        </div>
    </header>

    <main class="container">
        <div class="form-container">
            <a href="index.php" class="btn btn-secondary">⬅️ Kembali</a>
            
            <?php if($message): ?>
                <div class="alert alert-<?php echo $messageType; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="menu-form">
                <div class="form-group">
                    <label for="nama_makanan">Nama Makanan *</label>
                    <input type="text" id="nama_makanan" name="nama_makanan" 
                           value="<?php echo htmlspecialchars($menuData['nama_makanan']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori *</label>
                    <select id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Makanan Utama" <?php echo ($menuData['kategori'] == 'Makanan Utama') ? 'selected' : ''; ?>>Makanan Utama</option>
                        <option value="Appetizer" <?php echo ($menuData['kategori'] == 'Appetizer') ? 'selected' : ''; ?>>Appetizer</option>
                        <option value="Dessert" <?php echo ($menuData['kategori'] == 'Dessert') ? 'selected' : ''; ?>>Dessert</option>
                        <option value="Minuman" <?php echo ($menuData['kategori'] == 'Minuman') ? 'selected' : ''; ?>>Minuman</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="harga">Harga (Rp) *</label>
                    <input type="number" id="harga" name="harga" min="0" step="1000" 
                           value="<?php echo htmlspecialchars($menuData['harga']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi *</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" required><?php echo htmlspecialchars($menuData['deskripsi']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="gambar">URL Gambar</label>
                    <input type="text" id="gambar" name="gambar" 
                           value="<?php echo htmlspecialchars($menuData['gambar']); ?>" 
                           placeholder="https://example.com/image.jpg">
                </div>

                <div class="form-group">
                    <label for="status">Status *</label>
                    <select id="status" name="status" required>
                        <option value="Tersedia" <?php echo ($menuData['status'] == 'Tersedia') ? 'selected' : ''; ?>>Tersedia</option>
                        <option value="Habis" <?php echo ($menuData['status'] == 'Habis') ? 'selected' : ''; ?>>Habis</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 Update Menu</button>
                    <a href="index.php" class="btn btn-secondary">❌ Batal</a>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 Restoran Makanan Nusantara</p>
        </div>
    </footer>
</body>
</html>