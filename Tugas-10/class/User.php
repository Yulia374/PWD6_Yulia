<?php
require_once "../config/Database.php";

class User extends Database {
    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>