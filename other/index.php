<html>
    <head>
        <meta charset="utf-8">
        <title>Practice</title>
    </head>
    <body>
        <h1>Pracrice</h1><hr><br>
        <form method="POST" >
            <p>اقصى رقم 9,999,999,999</p>
            <input type="number" name="num">
            <input type="submit" value="Do">
        </form>
        <p dir="rtl" style="text-align:center;">
        <?php
            $num = $_POST['num']; 
            
            //put ',' each 3 digits for ease of read 
            $revNum = strrev($num);             
            echo "<p>";
            $numForEcho= "";
            for ($i=1; $i<=strlen($revNum); $i++){                
                if ($i%3){
                    $numForEcho.= $revNum[$i-1]; 
                }else{                    
                    $numForEcho .= $revNum[$i-1];
                    if ( $i!=strlen($revNum) ) $numForEcho.= "," ;
                    
                }
            }            
            echo strrev($numForEcho);
            echo "</p>";
            
            
            if (strlen($num) >10){ 
                //max digits validation [10 digits max]
                echo "<p>اقصى  قيمة هى 10 اعداد فقط</p>";
            }else {
                //4 arrays for all numbers's cases in string form 
                //digitsNameBase [--x] , digitsNameWithOne [-1x] , digitsNameTens [-x0] , digitsNameHundred [x00]
                $digitsNameBase = [" واحد", " اثنان", " ثلاثة" ," اربعة" ," خمسة" ," ستة"," سبعة"," ثمانية"," تسعة"];
                $digitsNameWithOne = ["احدى عشر","اثنى عشر","ثلاثة عشر","اربعة عشر","خمسة عشر","ستة عشر","سبعة عشر","ثمانية عشر","تسعة عشر"];
                $digitsNameTens =  ["عشرة","عشرون","ثلاثون","اربعون","خمسون","ستون","سبعون","ثمانون","تسعون"];
                $digitsNameHundred = ["مائة","مائتين","ثلاثمائة","اربعمائة","خمسمائة","ستمائة","سبعمائة","ثمانيمائة","تسعمائة"]; 
                
                //loop in number in reverse to get its position by calculate the power of base 10 
                $decimalPostion=[]; 
                for ($i=strlen($num); $i>0 , $i--; ){                
                    array_push ($decimalPostion,(10**$i));                 
                }                                
    
                //Functtions to display the string value in each three parts of number in (100 , 10 , 1)
                function inHundred($num , $key){
                    if ($num[$key] != 0){
                        echo ($key > 0 ) ? " و " : "" ; 
                        echo $GLOBALS['digitsNameHundred'] [ ($num[$key])-1 ];
                    }
                }

                function inTen($num , $key , $text=""){
                    if ($key > 0 && ($num[$key] > 0 || $num[$key+1] > 0) ) {
                        echo " و "; 
                    }
                    if ( $num[$key+1] == 0){                                                
                        echo $GLOBALS['digitsNameTens'][ ($num[$key])-1 ];                        
                    }elseif ($num[$key] == 1  && $num[$key+1] > 0){                        
                        echo $GLOBALS['digitsNameWithOne'][ ($num[$key+1])-1 ];                        
                    }elseif ($num[$key] >1 && $num[$key+1] >0){                        
                        echo $GLOBALS['digitsNameBase'][ ($num[$key+1])-1 ];
                        echo " و ".$GLOBALS['digitsNameTens'][ ($num[$key])-1 ];                        
                    }
                }

                function inBase($num , $key , $text=""){                    
                    if ($key == 0 || $num[$key-1]==0  ){
                        echo $GLOBALS['digitsNameBase'][ ($num[$key])-1 ];                        
                    }
                    if ($num[$key] || $num[$key-1] || $num[$key-2]){
                        echo " {$text} ";
                    }                   
                }
                //loop in decimalPostion then use key for search index in both $position array and $num string 
                //because length of $num and $decimalPostion are same 
                foreach  ($decimalPostion as $key => $position){                                        
                    switch($position) {
                        
                        case 1000000000://bilion                   
                            if ($num[$key] > 1 ){
                                echo $digitsNameBase[ ($num[$key])-1 ];
                                echo " مليار ";
                            }else {
                                echo " مليار ";
                            }
                            break ;
                        /***********************/
                        case 100000000: //100 in milion
                            inHundred($num , $key); 
                            break ;
                        case 10000000: //10 in milion               
                            inTen($num , $key , $text=" مليون "); 
                            break ;                        
                        case 1000000: //1 in milion
                            inBase($num , $key , $text=" مليون ");
                            break ;
                        /***********************/
                        case 100000://100 in thousand
                            inHundred($num , $key); 
                            break ;
                        case 10000://10 in thousand
                            inTen($num , $key , $text=" الف "); 
                            break ;
                        case 1000://1 in thousand
                            inBase($num , $key , $text=" الف ");
                            break ;   
                        /***********************/                        
                        case 100://100 in base
                            inHundred($num , $key);                             
                            break ;
                        case 10: //10 in base
                            inTen($num , $key ); 
                            break ;
                        case 1://100 in base
                            inBase($num , $key );
                            break ;
                    }
                }
            }            
        ?>
        </p>
        <br><hr><a href="" target="_blank">Source Code</a>
    </body>
</html>


