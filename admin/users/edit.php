<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../auth/login.php");
    exit;
}

require_once "../../database/connection.php";

$id = (int) $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
$user = mysqli_fetch_assoc($query);

if (!$user) {
    echo "User tidak ditemukan.";
    exit;
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = mysqli_query($conn, "UPDATE users
                                  SET name = '$name', email = '$email'
                                  WHERE id = $id");

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengubah user.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>

    <h2>Edit User</h2>

    <form method="POST">
        <label>Nama:</label><br>
        <input
            type="text"
            name="name"
            value="<?= htmlspecialchars($user['name']); ?>"
            required
        ><br><br>

        <label>Email:</label><br>
        <input
            type="email"
            name="email"
            value="<?= htmlspecialchars($user['email']); ?>"
            required
        ><br><br>

        <button type="submit" name="submit">Update</button>
    </form>

    <br>
    <a href="index.php">Kembali</a>

</body>
</html>
