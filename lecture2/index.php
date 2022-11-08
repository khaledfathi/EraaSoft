<html>
    <head>
        <title>Lecture 2 Tasks</title>        
    </head>
    <body>        
        
    <!--Point 1-->
        <form  method="POST">
            <label for="">Number </label>
            <input  type="number" name="num">
            <input  type="submit" value="Check">
        </form>
        <?php
            $num = $_POST['num']; 
            if(!$num){
                echo ""; 
            }elseif ($num%5){
                echo "<h3>{$num} is not accepted !</h3>";
            }else{
                echo "<h3>{$num} could divide by 5 </h3>";
            }
        ?>
        
        <?php
        //Point 2
            $count = 1 ; 
            while($count <= 100){
                echo $count." , "; 
                $count++;
            }
        ?>            
    
        <?php
        //Point 3
            $count = 1; 
            while ($count <= 100){
                echo (!($count%2)) ? $count." " : "";
                $count++;
            }
        ?>
    
        <?php
        //Point 4
            $count = 1; 
            while ($count <= 50){
                echo ($count%2) ? "<span>{$count} </span>" : "";
                $count++;
            }
        ?>
    
        <?php
        //Point 5
            $string = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, aperiam."; 
            echo "<p>String : {$string}</p>";

            $count = 0 ; 
            while ($count < strlen($string)){
                echo ($string[$count] === " ") ?  "<p> Letter ".($count+1)." : {Space} </p>" :  "<p> Letter ".($count+1)." : ".$string[$count]. "</p>";
                $count ++; 
            }
        ?>
            
        <?php
        //Point  6
            $count = 1 ; 
            echo "<p>";
            while ($count <= 10 ){
                echo $count; 
                echo ($count < 10) ?  "-" : ""; 
                $count ++ ; 
            }
            echo "</p>";
        ?>
                
        <?php
            //Point  7            
            $count=1; 
            $res=0; 
            while ($count <= 20 ){
                $res+=$count; 
                $count++; 
            }
            echo "<p>&#931;(1~20) = ".$res."</p>";
        ?>                    
        
        <?php
        //Point  8
            $count = 1 ; 
            while ($count <= 50){
                $start = 2; 
                $flagPrime = 0; 
                if ($count === 1 ||$count === 2) $flagPrime = 1; 
                while ($start < $count ){
                    if ($count%$start){
                        $flagPrime = 1; 
                    }else{
                        $flagPrime = 0; 
                        break;
                    }
                    $start++; 
                }
                $start =2; 
                if ($flagPrime){
                    echo "<p >";
                    echo ($count%2) ? "{$count} is Prime and | Number is <span>odd</span>": "{$count} is Prime | Number is <span >even</span>"; 
                }else {
                    echo "<p >";
                    echo ($count%2) ? "{$count} is NOT Prime and | Number is <span >odd</span>": "{$count} is NOT Prime | Number is <span >even</span>"; 
                }                    
                echo "</p>";
                $count++;
            }
        ?>

        <?php
            //Point  9
            echo "<table>"; 
            $count = 1; 
            $innerCount = 1 ; 
            while ($count <= 100){
                echo "<tr>";                    
                while ($innerCount <= 10){
                    echo "<td>".$count."</td>";
                    $count++;
                    $innerCount ++; 
                }
                echo "</tr>"; 
                $innerCount=1;                     
            }           
            echo "</table>";
        ?>
       
        <?php
            //Point  10
            for ($i=0; $i<10; $i++){
                for ($j=0; $j<$i; $j++){
                    echo "<span>#<span>";
                }
                echo "<br>";
            }
        ?>
                
        <?php        
            //Point  11           
            $count = 1 ; 
            echo "<p>";
            while ($count <= 5){
                if ($count > 1 && $count < 5){
                    echo $count."-"; 
                }
                echo $count;
                $count ++ ; 
            }
            echo "</p>";               
        ?>

    </body>
</html>



