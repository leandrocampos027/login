<?php

class User {
    private $conn;
    private $table = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($email, $password) {
        $sql = "INSERT INTO $this->table (email, password) VALUES (:email, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashed);
        return $stmt->execute();
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM $this->table WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['email'];
            return true;
        }
        return false;
    }

    public function exists($email) {
        $query = "SELECT id FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        return $stmt->rowCount() > 0;
    }

    public function isLogged() {
        return isset($_SESSION['user']);
    }

    public function logout() {
        session_destroy();
    }
}