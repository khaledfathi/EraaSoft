<html>
    <head>
        <title>Lecture 3 Taskes</title>
    </head>
    <body>
        <!--Function Tasks-->
        
        <?php
            //Point 1
            function addFive($num){
                return $num + 5 ; 
            };

            //Point 2
            function checkString ($str , $num){
                return (strlen($str) == $num) ? true : false ; 
            }

            //Point 3
            function evenOrOdd ($num){
                return ($num%2) ? 'odd' : 'even' ;                 
            }        
            
            //Point 4
            function isArrayDataValid ($arr , $item){
                foreach ($arr as $element) {
                     if ($item === $element) return true;
                }
                return false ; 
            }            

            //Point 5
            function replaceString (&$str , $word){
              // Requirments unclear
            }

            //Point 6
            function fullName ($firstName , $lastName){
                return "$firstName $lastName"; 
            }            
        ?>                
        
    </body>
</html>

