<html>
    <head>
        <meta charset="utf-8">
        <title>Lecture 2 Tasks</title>
        <style>
            .title{
                color : white ; 
                background : red; 
                padding: 10px;
                text-align: center;
                text-shadow : 3px 3px 5px black;
                font-size : 3em;
            }
            .codeLines{
                background: black; 
                color:white;
                display:inline-block;
                font-weight: normal;
                padding: 5px;
            }
            div{
                border: 1px solid black; 
                overflow : scroll; 
                padding :15px; 
            }
            .header , li{
                color : red ; 
            }
            span , p{
                font-weight : bold;                
            }
            .prime{
                color:green;
            }
            .notPrime{
                color:red;
            }
            .odd{
                color:#0004ff;
            }
            .even{
                color:#280946;
            }
            td{
                border: 1px solid black; 
            }
        </style>
    </head>
    <body>
        <h1 class="title">Lecture 2 Taskes</h1><hr><br>
        <div>
            <h2 class="header">- Write php script to print numbers that accept division by 5 in h3</h2>
            <p class="codeLines">PHP code lines : 59 ~ 68 </p>
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
        </div><br>    
        <div>
            <h2 class="header"> - Task 1 (Write a PHP script which will display numbers from 1 to 100 in h2)</h2>
            <p class="codeLines">PHP code lines : 74 ~ 80 </p>
            <h2>
            <?php
                $count = 1 ; 
                while($count <= 100){
                    echo $count." , "; 
                    $count++;
                }
            ?>    
            </h2>           
        </div><br>
        <div>
            <h2 class="header">- Type even numbers from 1 to 100 in paragraph using while</h2>
            <p class="codeLines">PHP code lines : 87 ~ 93 </p>
            <p>
            <?php
                $count = 1; 
                while ($count <= 100){
                    echo (!($count%2)) ? $count." " : "";
                    $count++;
                }
            ?>
            </p>
        </div><br>
        <div>
            <h2 class="header">- Write php script witch will print odd numbers from 1 to 50 in span</h2>
            <p class="codeLines">PHP code lines : 99 ~ 105 </p><br>
            <?php
                $count = 1; 
                while ($count <= 50){
                    echo ($count%2) ? "<span>{$count} </span>" : "";
                    $count++;
                }
            ?>
        </div><br>
        <div>
            <h2 class="header">- Write php script that print all chars from this string</h2>
            <p class="codeLines">PHP code lines : 110 ~ 119 </p>
            <?php
                $string = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, aperiam."; 
                echo "<p>String : {$string}</p>";

                $count = 0 ; 
                while ($count < strlen($string)){
                    echo ($string[$count] === " ") ?  "<p> Letter ".($count+1)." : {Space} </p>" :  "<p> Letter ".($count+1)." : ".$string[$count]. "</p>";
                    $count ++; 
                }
            ?>
        </div><br>
        <div>
            <h2 class="header">- Create a script that displays 1-2-3-4-5-6-7-8-9-10 on one line.<br>- There will be no hyphen(-) at starting and ending position.</h2>            
            <p class="codeLines">PHP code lines : 124 ~ 133 </p>
            <?php
                $count = 1 ; 
                echo "<p>";
                while ($count <= 10 ){
                    echo $count; 
                    echo ($count < 10) ?  "-" : ""; 
                    $count ++ ; 
                }
                echo "</p>";
            ?>
        </div><br>  
        <div>
            <h2 class="header">- Write php script to get the submission for the numbers between 1 and 20 .</h2>
            <p class="codeLines">PHP code lines : 138 ~ 146 </p>
            <?php
                $count=1; 
                $res=0; 
                while ($count <= 20 ){
                    $res+=$count; 
                    $count++; 
                }
                echo "<p>&#931;(1~20) = ".$res."</p>";
            ?>
        </div><br>
        <div>   
            <h2 class="header">- Write php script to display numbers between 1 and 50 and </h2>
            <ul>
                <li>If the number is prime ( type this number is prime )</li>
                <li>If number is even  - type this number is even </li>
                <li>If number is odd  - type this number is odd </li>
            </ul>
            <p class="codeLines">PHP code lines : 156 ~ 182 </p>
            <?php
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
                        echo "<p class='prime'>";
                        echo ($count%2) ? "{$count} is Prime and | Number is <span class='odd'>odd</span>": "{$count} is Prime | Number is <span class='even'>even</span>"; 
                    }else {
                        echo "<p class='notPrime'>";
                        echo ($count%2) ? "{$count} is NOT Prime and | Number is <span class='odd'>odd</span>": "{$count} is NOT Prime | Number is <span class='even'>even</span>"; 
                    }                    
                    echo "</p>";
                    $count++;
                }
            ?>
        </div><br>   
        <div>
            <h2 class="header">- Write a php script to display a square 10 * 10 ( from 1 to 100 ) </h2>
            <p class="codeLines">PHP code lines : 188 ~ 201 </p>
            <table>
                <?php
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
                ?>
            </table>
        </div><br>   
        <div>
            <h2 class="header">- Draw a tringle from (#) using for loop </h2>
            <p class="codeLines">PHP code lines : 202 ~ 215 </p>
                <?php
                    for ($i=0; $i<10; $i++){
                        for ($j=0; $j<$i; $j++){
                            echo "<span>#<span>";
                        }
                        echo "<br>";
                    }
                ?>
        </div><br>
        <div>
            <h2 class="header">- Display the previous string </h2>
            <p class="codeLines">PHP code lines : 220 ~ 231 </p>
            <p>String : "12-23-34-45"</p>
            <?php
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
        </div><br>  
    </body>
</html>



