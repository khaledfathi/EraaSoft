<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="login" action="login.php" method="post">
        <div>
            <label for="">Email</label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="pw">
        </div>
        <input type="submit" name="submit" value="Login">
        <button><a href="index.php">SignUp</a></button>
    </form>
</body>
</html>

<?php
session_start(); 
if (isset($_SESSION['login'])){
    if ($_SESSION['login']){
        header('location: profile.php');
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $database = json_decode(file_get_contents('database') , true); 
    if (empty($_POST['email']) || empty($_POST['pw'])) {
        echo "<h3 class='error'> ERROR: All fileds are required </h3>"; 
    }else{
        foreach ($database as $key=>$user){
            if ($user['email'] == trim($_POST['email'])&&
                $user['pw'] == md5($_POST['pw'])){
                $_SESSION['id']=$user['id']; 
                $_SESSION['login']=true;
                header('location: profile.php');
            }
        }
        echo "<h3 class='error'> Invalid Email or password </h3>"; 
    }
    
}
?>
