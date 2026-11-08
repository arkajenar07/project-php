<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../auth/login.php");
    exit;
}

require_once "../../database/connection.php";

$query = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Users</title>
</head>
<body>
    <h2>Menu Users</h2>

    <p><a href="../index.php">Kembali ke Dashboard</a></p>
    <p><a href="create.php">Tambah User</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;

            if (mysqli_num_rows($query) > 0) {
                while ($user = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $user['id']; ?></td>
                    <td><?= htmlspecialchars($user['name']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td>
                        <a href="edit.php?id=<?=$user['id']; ?>">Edit</a>

                        <form action="delete.php" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus user ini?')"
                              style="display:inline;">
                            <input type="hidden" name="id" value="<?=$user['id']; ?>">
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="5">Belum ada data user.</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>