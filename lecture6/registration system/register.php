<?php 

/*** FUNCTIONS ***/

//form santizing 
function sanitizing($request){
    foreach($request as $key=>$field){
        if ($key != 'pw' && $key != 'cpw'){
           $request[$key]= trim (htmlentities(htmlspecialchars($field))); 
        }
    }
    return $request;
}

//check dublicated account by its email 
function isEmailDublicated($email , $fileName='database'){
    $records = json_decode(file_get_contents($fileName) , true); 
    foreach($records as $record){
        if ($record['email'] ===  $email){
            return true ; 
        }
    }
    return false ; 
}

//form validation 
function isValid($request , $nameLength , $passwordLength){
    $valid=['state'=>true, 'error'=>''];
    if(empty($request['un']) || empty($request['email']) || empty($request['pw']) ){
        $valid['state']=false; 
        $valid['error']="All Fields are Required!";
    }elseif (strlen($request['un']) < $nameLength){
        $valid['state']=false; 
        $valid['error']="Name should have at least $nameLength Characters";
    }elseif (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)){
        $valid['state']=false; 
        $valid['error']="Invalid Email Address";
    }elseif(isEmailDublicated($request['email'])){
        $valid['state']=false; 
        $valid['error']="Email \"".$request['email']."\" is already exist";
    }elseif(strlen($request['pw'])< $passwordLength){
        $valid['state']=false; 
        $valid['error']="Password should have at least $passwordLength Characters";
    }elseif ($request['pw'] != $request['cpw']){
        $valid['state']=false; 
        $valid['error']="Password and confirm password didn't  match";
    }
    return $valid; 
}


function addRecord($fileName , $record){
    unset ($record['cpw']);
    $id = 1; 
    if(!file_exists($fileName)){
        $record['pw']= md5($record['pw']);
        $record['id']=$id; 
        $record= [$record]; 
        $recordToJSON= json_encode($record , true);
        file_put_contents($fileName , $recordToJSON);
    }else {
        $record['pw']= md5($record['pw']);
        $newRecord = json_decode(file_get_contents($fileName), true);
        $id =end($newRecord)['id'] +=1;  
        $record['id'] = $id ; 
        $newRecord[]= $record;  
        file_put_contents($fileName , json_encode($newRecord , true)); 
    }
    return $id; 
}

/*** SERVER  ***/
session_start();
if (isset($_SESSION['login'])){
if ($_SESSION['login']){header('location: profile.php');} 
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    $request= sanitizing($_POST);
    $valid = isValid($request , $nameLength=3 , $passwordLength=6); 
    if ($valid['state']){
        $_SESSION['id'] = addRecord('database' , $request);
        $_SESSION['login']=true;
        header('location: profile.php'); 
    }else {
        echo"<h3>".$valid['error']."</h3><button><a href='register.php' style='text-decoration:none;'>Back</a></button>";
    }
}else{
    header('location: index.php'); 
}
?>
