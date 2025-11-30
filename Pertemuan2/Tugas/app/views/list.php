<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Daftar Pengguna</h1>

        <!-- Tombol Tambah Pengguna -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="index.php?create" class="btn btn-success">
                Tambah Pengguna
            </a>
        </div>

        <!-- Tabel untuk menampilkan daftar semua pengguna -->
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop untuk menampilkan setiap pengguna -->
                <?php foreach ($users as $user): ?>
                    <tr>
                        <!-- Menampilkan nama dengan sanitasi HTML untuk keamanan -->
                        <td><?= htmlspecialchars($user['name']); ?></td>
                        <!-- Menampilkan email dengan sanitasi HTML -->
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <!-- Link untuk melihat detail pengguna berdasarkan ID -->
                        <td class="text-center">
                            <a href="index.php?id=<?= $user['id']; ?>" class="btn btn-primary btn-sm">Detail</a>
                            <!-- Tombol Edit -->
                            <a href="index.php?edit=<?= $user['id']; ?>" class="btn btn-warning btn-sm text-white">
                                Edit
                            </a>

                            <!-- Tombol Delete -->
                            <a href="index.php?delete=<?= $user['id']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus pengguna ini?');">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>