<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>        
        span ,p{font-size:15pt;}
        span{font-weight:bold; display: inline-block; min-width: 120px;}
    </style>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD']==='GET'){
        $file = json_decode (file_get_contents('data.json') , true); 
        $notFound=true; 
        foreach ($file as $recoed){
            if ($recoed['id'] == $_GET['id']){
                echo "<p><span>ID </span>".$recoed['id']."</p>
                    <p><span>Name </span>".$recoed['name']."</p>
                    <p><span>Email </span>".$recoed['email']."</p>
                    <p><span>Phone </span>".$recoed['gender']."</p>
                    <p><span>Phone </span>".$recoed['phone']."</p>
                    <p><span>password </span>".$recoed['password']."</p>";
                    $notFound=false; 
                    break;
            } 
        }
        echo ($notFound)? "<p>ID : ".$_GET['id']." is not found!<p>":"";
    }
    ?>
    <br><br>
    <a href="index.php">Back to home page</a>
</body>
</html>