<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="login.php" method="post">
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
if ($_SESSION['login']){
    header('location: profile.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $database = json_decode(file_get_contents('database') , true); 
    foreach ($database as $key=>$user){
        if ($user['email'] == trim($_POST['email'])){
            $_SESSION['id']=$user['id']; 
            $_SESSION['login']=true;
            header('location: profile.php'); 
        }elseif (empty($request['email']) || empty($request['pw'])) {
            echo "All fileds are required"; 
            break;
        }else{
            echo "Invalid Email or password"; 
        }
    }
}
?>
