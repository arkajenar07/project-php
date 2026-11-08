<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../auth/login.php");
    exit;
}

require_once "../../database/connection.php";

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = mysqli_query($conn, "INSERT INTO users (name, email, password)
                                  VALUES ('$name', '$email', '$password')");

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan user.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
</head>
<body>

    <h2>Tambah User</h2>

    <form method="POST">
        <label>Nama:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit" name="submit">Simpan</button>
    </form>

    <br>
    <a href="index.php">Kembali</a>

</body>
</html>
