<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>lecture 4 task | point2</title>
    <style>
        table , td , th{ border: 1px solid black; padding:5px; text-align:center; border-collapse: collapse;}
        a{line-height:1.5em;}
    </style>
</head>
<body>    
    <?php
        //Links : 
        echo '<a href="https://localhost/code/p2/?name=ameen">name</a><br>';
        echo '<a href="https://localhost/code/p2/?email=ameen@gmail.com">Email</a><br>';
        echo '<a href="https://localhost/code/p2/?phone=01142565236">Phone</a><br> ';
        foreach($_GET as $key => $value){
            if ($key=="name" || $key=="email" || $key=="phone"){
                echo ($value) ? "<h3>$key : $value</h3>" : "";
            }            
        }        
    ?>
</body>
</html>