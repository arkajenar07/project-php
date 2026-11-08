<?php
include('./database/connection.php');

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $result = mysqli_num_rows($query);
    
    if($result > 0) {
        $user = mysqli_fetch_assoc($query);
        $_SESSION['id'] = $user['id'];
        header("Location: ../admin/index.php");
    } else {
        echo "Email atau password salah";
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
        <h1>Login</h1>
        <form action="" method="post">
            <div class="input">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="input">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
    </section>
</body>
</html>