<?php
require_once 'Database.php';
require_once 'Menu.php';

$database = new Database();
$db = $database->getConnection();

$menu = new Menu($db);

// Get ID from URL
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID tidak ditemukan.');

// Set ID untuk dihapus
$menu->id = $id;

// Hapus menu
if($menu->delete()) {
    // Redirect ke halaman utama dengan pesan sukses
    header("Location: index.php?message=deleted");
} else {
    // Redirect dengan pesan error
    header("Location: index.php?message=error");
}
?>