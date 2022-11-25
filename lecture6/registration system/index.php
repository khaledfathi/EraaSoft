<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="index" action="register.php" method="POST">
        <div>
            <label for="">User Name</label>
            <input type="text" name="un">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="">password</label>
            <input type="password" name="pw">
        </div>
        <div>
            <label for="">Confirm Password</label>
            <input type="password" name="cpw">
        </div>
        <input type="submit" value="SignUp">
        <button><a href="login.php">Login</a></button>
    </form>
</body>
</html>

<?php
session_start(); 
if(isset($_SESSION['login'])){
    if($_SESSION['login']){
        header('location: profile.php'); 
    }
}
?>
