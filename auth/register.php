<?php
include('../database/connection.php');

if (isset($_POST['regis'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($connection, "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");

    if ($query) {
        header("Location: ./login.php");
    } else {
        echo "<p style='color: red;'>Gagal mendaftar</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <h1>Register</h1>
        <form action="" method="post">
            <div class="input">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="input">
                <label for="email">Email</label>
                <input type="email" id="email" name="email1">
            </div>
            <div class="input">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <label for="roles"></label>
                <select name="roles" id="roles">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <button type="submit" name="regis">Register</button>
        </form>
    </section>
</body>
</html>