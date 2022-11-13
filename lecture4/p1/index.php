<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>lecture 3 task | point1</title>
    <style>
        table , td , th{ border: 1px solid black; padding:5px; text-align:center; border-collapse: collapse;}
        a{line-height:1.5em;}
    </style>
</head>
<body>        
    <form action="" method="get">        
        <label for="">Name</label>
        <input type="text" name="name">
        <label for="">Email</label>
        <input type="text" name="email">
        <input type="submit"  name="submit" >
    </form><br>
    <?php
        if($_GET['submit']){ 
            $name = $_GET['name'];
            $email = $_GET['email'];
            if ($name || $email){
                echo  "<h3>Nmae : {$name}</h3>
                    <h3>E-Mail : {$email}</h3>";
            }else {
                echo "<h3>Not submited</h3>";
            }
        } 
    ?>        
</body>
</html>