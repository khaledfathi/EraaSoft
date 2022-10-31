<?php
/*task 1 */
$age1 = 20;
$age2 = 10;
if ($age1 === $age2){
    echo "age of Ahmed and Mohamed is ".($age1)."\n";
}
if ($age1 > $age2){
    echo "Ahmed is older than Mohamed\n";
}elseif ($age2 > $age1) {
    echo "Mohamed is older than Ahmed\n";
}
?>

<?php
/*task 2 */
$str1 = strlen ("Lorem ipsum dolor sit amet consectetur adipisicing elit.");
$str2 = strlen ("nam exercitationem eligendi expedita, provident distinctio non praesentium");

//check lenght of first string
if ($str1 > 20 && $str1 < 40){
    echo ("string is week\n"); 
}elseif ($str1 > 40 && $str1 < 80){
    echo ("string is good\n"); 
}elseif ($str1 > 80) {
    echo("very good\n");
}

//compareing between first  string and second string
if ($str1 > $str2){
    echo ("first is greater than second\n");
}elseif ($str1 < $str2){
    echo ("first is smaller than second\n");
}elseif ($str1 === $str2){
    echo ("first is equal than second\n");
}

?>

<?php
/*task 3  Calculator*/
$value1 = readline("Number : "); 
$operator = readline(" operator [+ - * / %] : "); 
$value2  = readline("Number : "); 

if ($operator === "+"){
    echo ($value1 ." + ". $value2 ." = ". ($value1 + $value2)."\n"); 
}elseif ($operator === "-"){
    echo ($value1 ." - ". $value2 ." = ". ($value1 - $value2)."\n"); 
}elseif ($operator === "*"){
    echo ($value1 ." * ". $value2 ." = ". ($value1 * $value2."\n")); 
}elseif ($operator === "/"){
    if ($value2 == 0 ){ 
        echo ("can not divide by zero");
    }else {
        echo ($value1 ." / ". $value2 ." = ".($value1 / $value2)."\n"); 
    }
}elseif ($operator === "%"){
    echo ($value1 ." * ". $value2 ." = ".($value1 % $value2)."\n");
}
?>

<?php
/*task 4 check student degree */
$degree = readline("Enter Degree :"); 

if ($degree >= 50 && $degree < 56){
    echo ("Accepted"); 
}elseif ($degree >= 65 && $degree < 75){
    echo ("good"); 
}elseif ($degree >= 75 && $degree < 85){
    echo ("very good"); 
}elseif ($degree > 85){
    echo ("Excellent"); 
}
?>

<?php
/*task 5 check student degree */
$description = "no pain , no gain ";

if (str_contains($description, "gain")){
    echo ("success word\n"); 
}elseif (str_contains($description, "peen")){
    echo ("success word\n"); 
}else {
    echo ("wrong word\n"); 
}
?>
