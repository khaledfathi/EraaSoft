
<?php
session_start();
if (isset($_SESSION['login'])){
    if ($_SESSION['login']){
        $records = json_decode (file_get_contents('database'), true ); 
        foreach ($records as $record){
            if ($record['id'] == $_SESSION['id']){
                $id = $record['id']; 
                $un = $record['un']; 
                $email = $record['email']; 

                $cookieData = json_encode(['id'=>$id, 'un'=>$un , 'email'=> $email] , true); 
                    setcookie('userLogin' ,
                    openssl_encrypt($cookieData ,openssl_get_cipher_methods(true)[0] , 'password' ),
                    time()+(86400*30)); //for 1 day 
               //FOR DECRYPT COOKIE DATA 
                //print_r (json_decode(
                //    openssl_decrypt($_COOKIE['userLogin'] , openssl_get_cipher_methods(true)[0] , 'password'),
                //    true));
            }
        }
    }
}else{
    header('location: login.php'); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="profile">
        <h1>Your Profile</h1>
        <h3>Welcome Back <span>'<?php echo $un?>'</span></h3>
        <table>
            <thead>
                <th>ID</th>
                <th>UserName</th>
                <th>Email</th>
            </thead>
            <tr>
                <td><?php echo $id?></td>
                <td><?php echo $un?></td>
                <td><?php echo $email?></td>
            </tr>
        </table>
        <button><a href="logout.php">Logout</a></button>
    <div>
</body>
</html>

