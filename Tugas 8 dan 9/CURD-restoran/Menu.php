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

    public function create() {
        $query = "INSERT INTO " . $this->table . " 
                  (nama_makanan, kategori, harga, deskripsi, gambar, status) 
                  VALUES 
                  (:nama_makanan, :kategori, :harga, :deskripsi, :gambar, :status)";
        
        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->nama_makanan = htmlspecialchars(strip_tags($this->nama_makanan));
        $this->kategori = htmlspecialchars(strip_tags($this->kategori));
        $this->harga = htmlspecialchars(strip_tags($this->harga));
        $this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
        $this->gambar = htmlspecialchars(strip_tags($this->gambar));
        $this->status = htmlspecialchars(strip_tags($this->status));

        // Bind parameters
        $stmt->bindParam(":nama_makanan", $this->nama_makanan);
        $stmt->bindParam(":kategori", $this->kategori);
        $stmt->bindParam(":harga", $this->harga);
        $stmt->bindParam(":deskripsi", $this->deskripsi);
        $stmt->bindParam(":gambar", $this->gambar);
        $stmt->bindParam(":status", $this->status);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table . " 
                  SET 
                      nama_makanan = :nama_makanan,
                      kategori = :kategori,
                      harga = :harga,
                      deskripsi = :deskripsi,
                      gambar = :gambar,
                      status = :status
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->nama_makanan = htmlspecialchars(strip_tags($this->nama_makanan));
        $this->kategori = htmlspecialchars(strip_tags($this->kategori));
        $this->harga = htmlspecialchars(strip_tags($this->harga));
        $this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
        $this->gambar = htmlspecialchars(strip_tags($this->gambar));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind parameters
        $stmt->bindParam(":nama_makanan", $this->nama_makanan);
        $stmt->bindParam(":kategori", $this->kategori);
        $stmt->bindParam(":harga", $this->harga);
        $stmt->bindParam(":deskripsi", $this->deskripsi);
        $stmt->bindParam(":gambar", $this->gambar);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function formatRupiah($harga) {
        return "Rp " . number_format($harga, 0, ',', '.');
    }
}
?>