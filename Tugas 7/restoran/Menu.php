<?php
class Menu {
    private $conn;
    private $table = "menu_makanan";

    public $id;
    public $nama_makanan;
    public $kategori;
    public $harga;
    public $deskripsi;
    public $gambar;
    public $status;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllMenu() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY kategori, nama_makanan";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getMenuByKategori($kategori) {
        $query = "SELECT * FROM " . $this->table . " WHERE kategori = :kategori ORDER BY nama_makanan";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":kategori", $kategori);
        $stmt->execute();
        return $stmt;
    }

    public function getMenuById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function formatRupiah($harga) {
        return "Rp " . number_format($harga, 0, ',', '.');
    }
}
?>