<?php

/**
 * Model User
 * Menangani semua operasi database yang berkaitan dengan tabel users
 */
class User
{
    // Property untuk menyimpan koneksi database
    private $pdo;

    /**
     * Constructor
     * $pdo - Objek koneksi database
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Mengambil semua data pengguna dari database
     */
    public function getAllUsers()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Mengambil data pengguna berdasarkan ID
     * $id - ID pengguna yang ingin diambil
     */
    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Menambahkan pengguna baru ke database
     * $name - Nama pengguna
     * $email - Email pengguna
     */
    public function createUser($name, $email)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        return $stmt->execute([$name, $email]);
    }

    /**
     * Memperbarui data pengguna berdasarkan ID
     * $id - ID pengguna yang akan diperbarui
     * $name - Nama baru
     * $email - Email baru
     */
    public function updateUser($id, $name, $email)
    {
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $id]);
    }
    
    /**
     * Menghapus pengguna berdasarkan ID
     * $id - ID pengguna yang akan dihapus
     */ 
    public function deleteUser($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

}
