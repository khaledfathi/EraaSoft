<html>
    <head>
        <title>Lecture 3 Taskes</title>
    </head>
    <body>
        <!--Array Tasks-->        
        <?php
            //Point 1
            $colors = ["red","green","blue","black","white"];
            foreach ($colors as $color) echo "<h2>$color</h2>";             
                    
            //Point 2
            $colors = ["red","green","blue","black","white"];
            echo '<ul>';
            foreach ($colors as $color) echo "<li>$color</li>"; 
            echo '</ul>';
                        
            //Point 3
            $colors = ["red","green","blue","black","white"];
            array_push($colors, 'cyan','yellow','gray');             
            foreach ($colors as $color) echo "<h3>$color</h3>";                 

            //Point 4
            $numbers = [10,20,30,40,50];
            foreach ($numbers as $number) echo "<h3>$number</h3>";        
                
            //Point 5
            $numbers = [10,20,30,40,50];
            $newNumbers = []; 
            foreach ($numbers as $number) array_push($newNumbers , $number+5);            
        
            //Point 6
            $numbers = [10,20,30,40,50];
            $newNumbers = []; 
            foreach ($numbers as $number) array_push($newNumbers , $number/5);        
        
            //Point 7
            $numbers = [10,20,30,40,50];            
            array_push($numbers , 60 , 70 , 80);                            

            //Point 8
            $users = [                
                ["mohamed ali",20],
                ["rana ahmad",19],
                ["maged khaled",25]
                ] ;
            foreach ($users as $data ) echo " Name : {$data[0]}<br> Age : {$data[1]} <br><hr>";        
        
            //Point 9
            $employees = [
                ["mohamed ali","mohamad@eraasoft.com","01024256993",2500],
                ["reham mohamad","reham@eraasoft.com","01122255448",3000],
                ["maged hesham","maged@eraasoft.com","01024213361",4000],
                ["ali mahmoud","ali@eraasoft.com","01142547485",2000],
                ["nader elsayed","nader@eraasoft.com","01123659854",1000]
                ];
                echo "<table>";
                    foreach ($employees as $row){                        
                        echo "<tr>";
                        foreach ($row as $item){
                            echo "<td style='border:1px solid black;'>$item</td>";
                        }
                        echo "</tr>";
                    }
                echo "</table>";        
        ?>
    </body>
</html>

