<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>lecture 4 task | uploade image </title>
    <style>
        table , td , th{ border: 1px solid black; padding:5px; text-align:center; border-collapse: collapse;}
        a{line-height:1.5em;}
    </style>
</head>
<body>    
    <?php
        $products = [
            ["product number 1",300,50],
            ["product number 2",250,1000],
            ["product number 3",30,1200],
            ["product number 4",1500,10],
            ["product number 5",450,300]
        ];        
        echo "<table>
                <thead>
                    <th>Name</th>
                    <th>Price</th>
                    <th>quantity</th>   
                </thead>";            
            foreach ($products as $index=>$row){                   
                echo "<tr>"; 
                foreach ($row as $cell){
                    echo "<td>$cell</td>";
                }
                echo "</tr>"; 
            }
        echo "</table><br>";
    ?>
    <form action="show-product.php" method="post">
        <input type="hidden" name="id" , value="3">
        <input type="submit" value="Get Row">
    </form>
</body>
</html>