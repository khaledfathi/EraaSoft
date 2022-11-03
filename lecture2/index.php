<html>
    <head>
        <meta charset="utf-8">
        <title>Lecture 1 Tasks</title>
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
            p{
                font-weight: bold ; 
            }
        </style>
    </head>
    <body>        
        <h1 class="title">Lecture 1 Taskes</h1><hr><br>
        <div>
            <h2 class="header">- Make a calculator with these operations using if and elseif
                <br>(Submission- Subtraction - Multiplication - Division - Power - Modulus)</h2>
            <p class="codeLines">PHP code lines : 53 ~ 76 </p>
            <form  method="POST">
                <input type="number" name="value1">                
                <select name="operator" id="">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="^">^</option>
                    <option value="/">/</option>
                    <option value="%">%</option>
                </select>
                <input type="number" name="value2">
                <input type="submit" value="Calc"><span> * Result will shown under input after page is refreshed<span>
            </form>
            <?php                                
            $value1 = $_POST['value1'] ;
            $operator = $_POST['operator'] ;
            $value2 = $_POST['value2'] ;                                        
            if ( ($value1  && $value2) || ($value1 == 0 || $value2 == 0)){ 
                if ($operator == "+"){
                    echo ("<p>".$value1 ." + ". $value2 ." = ". ($value1 + $value2)."</p>"); 
                }elseif ($operator == "-"){
                    echo ("<p>".$value1 ." - ". $value2 ." = ". ($value1 - $value2)."</p>"); 
                }elseif ($operator == "*"){
                    echo ("<p>".$value1 ." * ". $value2 ." = ". ($value1 * $value2."</p>")); 
                }elseif ($operator == "^"){
                    echo ("<p>".$value1 ." ^ ". $value2 ." = ". ($value1 ** $value2."</p>")); 
                }elseif ($operator == "/"){
                    if ($value2 == 0 ){ 
                        echo ("<p>can not divide by zero</p>");
                    }else {
                        echo ("<p>".$value1 ." / ". $value2 ." = ".($value1 / $value2)."</p>"); 
                    }
                }elseif ($operator == "%"){
                    echo ("<p>".$value1 ." % ". $value2 ." = ".($value1 % $value2)."</p>");
                }
            }
            ?>
        </div><br>
        <div>
            <h2 class="header">- Make a program to check from degree of student to test these cases</h2>
            <ul>
                <li>>= 50 and < 65 is accepted</li>
                <li>>= 65 and < 75 is good</li>
                <li>>= 75 and < 85 is very good</li>
                <li>>= 85 is Excellent</li>
            </ul>
            <p class="codeLines">PHP code lines : 91 ~ 106 </p>
            <form method = "POST">
                <input type="number" name="degree" >
                <input type="submit" value = "Grade"><span> * Result will shown under input after page is refreshed<span>
            </form>
            <?php
                $degree = $_POST['degree']; 
                if ($degree){
                    if ($degree >= 50 && $degree < 56){
                        echo "<p>Accepted</p>"; 
                    }elseif ($degree >= 65 && $degree < 75){
                        echo "<p>good</p>"; 
                    }elseif ($degree >= 75 && $degree < 85){
                        echo "<p>very good</p>"; 
                    }elseif ($degree > 85){
                        echo "<p>Excellent</p>"; 
                    }else {
                        echo "<p>Fail</p>"; 
                    }    
                }                
            ?>
        </div><br>
        <div>
            <h2 class="header">- Make random two numbers for ages and</h2>            
            <ul>
                <li>If the first number greater than second number <br>Print ( ahmed is older than mohmed )</li>
                <li>If the second number is greater<br>Print ( mohamed is older than ahmed )</li>
                <li>If age_one equal to age_two <br>Print ( age of ahmed and Mohamad is (age) )</li>
            </ul>
            <p class="codeLines">PHP code lines : 116 ~ 128 </p>
            <?php
                $ahmedAge1 = 10;
                $mohamedAge2 = 20;
                echo "<p>Age of Ahmed = {$ahmedAge1} , Age of Mohamed = {$mohamedAge2}</p>"; 
                if ($ahmedAge1 === $mohamedAge2){
                    echo "<p>age of Ahmed and Mohamed is {$ahmedAge1}<p>";
                }
                if ($ahmedAge1 < $mohamedAge2){
                    echo "<p>Mohamed is older than Ahmed<p>";
                }elseif ($ahmedAge1 > $mohamedAge2) {
                    echo "<p>Ahmed is older than Mohamed</p>";
                }
            ?>
        </div><br>
        <div>
            <h2 class="header">- Get two random strings from previous string</h2>            
            <ul>
                <li>If length of first string is greater than 20 and < 40 <br>Print ( string is week )</li>
                <li>If length of first string is greater than 40 and < 80 <br>Print ( string is good )</li>
                <li>If length of first string is greater than 80 <br>Print ( string is very good )</li>
                <li>Compare between length of first and second string<br>
                    - First case ( first is greater than second )<br>
                    - Second case ( first is smaller than second )<br>
                    - Third case ( first is equal than second )<br>
                    - Print text according to every status
                </li>
            </ul>
            <p class="codeLines">PHP code lines : 144 ~ 169 </p>
            <?php
                $str1 = "Lorem ipsum dolor sit amet consectetur adipisicing elit."; 
                $str2 = "nam exercitationem eligendi expedita, provident distinctio non praesentium"; 
                echo "<p>String 1 : {$str1}</p>"; 
                echo "<p>String 2 : {$str2}</p><br>"; 

                //check lenght of first string
                $str1Size = strlen($str1);
                $str2Size = strlen($str2);                
                if ($str1Size > 20 && $str1Size < 40){
                    echo ("<p>string is week</p>"); 
                }elseif ($str1Size > 40 && $str1Size < 80){
                    echo ("<p>string is good</p>"); 
                }elseif ($str1Size > 80) {
                    echo("<p>very good</p>");
                } 

                //compareing between first  string and second string
                if ($str1Size > $str2Size){
                    echo ("<p>first is greater than second</p>");
                }elseif ($str1Size < $str2Size){
                    echo ("<p>first is smaller than second</p>");
                }elseif ($str1Size === $str2Size){
                    echo ("<p>first is equal than second</p>");
                }
            ?>
        </div><br> 
        <div>
            <h2 class="header">- Check from this string</h2>
            <ul>
                <li>If the string have “gain”<br>Print ( success word )</li>
                <li>If the string have ( peen )<br>Print ( success word )</li>
                <li>Else ( wrong word</li>                
            </ul>
            <p class="codeLines">PHP code lines : 179 ~ 190 </p>
            <?php
                $description = "no pain , no gain ";
                echo "<p>String : {$description} </p>";

                if (str_contains($description, "gain")){
                    echo "<p>success word</p>"; 
                }elseif (str_contains($description, "peen")){
                    echo "<p>success word</p>"; 
                }else {
                    echo "<p>wrong word</p>"; 
                }
            ?>
        </div><br>
    </body>
</html>