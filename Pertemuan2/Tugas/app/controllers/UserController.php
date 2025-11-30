<?php

/**
 * Controller User
 * Mengatur tampilan daftar user dan detail user
 */
class UserController
{
    private $userModel;

    // Constructor - buat object User model
    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    // Method utama - routing berdasarkan parameter id
    public function index()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->detail($_GET['id']);
        } elseif (isset($_GET['edit']) && !empty($_GET['edit'])) {
            $this->edit($_GET['edit']);
        } elseif (isset($_GET['delete']) && !empty($_GET['delete'])) {
            $this->delete($_GET['delete']);
        } elseif (isset($_GET['create'])) {
            $this->create();
        } else {
            $this->list();
        }
    }

    // Tampilkan daftar semua user
    private function list()
    {
        $users = $this->userModel->getAllUsers();
        require_once __DIR__ . '/../views/list.php';
    }

    // Tampilkan detail user berdasarkan id
    private function detail($id)
    {
        $user = $this->userModel->getUserById($id);
        require_once __DIR__ . '/../views/detail.php';
    }

    // Tambah pengguna baru
    private function create()
    {
        // Tangani form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            if ($this->userModel->createUser($name, $email)) {
                header('Location: index.php');
                exit;
            } else {
                $error = "Gagal menambahkan pengguna baru.";
            }
        }

        // Tampilkan form tambah pengguna
        require_once __DIR__ . '/../views/create.php';
    }

    // Edit pengguna berdasarkan id
    private function edit($id)
    {
        // Ambil data pengguna yang akan diedit
        $user = $this->userModel->getUserById($id);

        // Tangani form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            if ($this->userModel->updateUser($id, $name, $email)) {
                header('Location: index.php');
                exit;
            } else {
                $error = "Gagal memperbarui data pengguna.";
            }
        }

        // Tampilkan form edit pengguna
        require_once __DIR__ . '/../views/edit.php';
    }

    // Hapus pengguna berdasarkan id
    private function delete($id)
    {
        if ($this->userModel->deleteUser($id)) {
            header('Location: index.php');
            exit;
        } else {
            echo "<script>alert('Gagal menghapus pengguna.'); window.location='index.php';</script>";
        }
    }
}
