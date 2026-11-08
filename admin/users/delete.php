<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../auth/login.php");
    exit;
}

require_once "../../database/connection.php";

if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];

    $query = mysqli_query($conn, "DELETE FROM users WHERE id =$id");

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus user.";
    }
} else {
    echo "ID user tidak ditemukan.";
}
?>