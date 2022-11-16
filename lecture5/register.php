<?php
/********** FUNCTIONS ********/
function formSantizing($request){
    //return same input after santizing process
    foreach ($request as $key=>$field){
        $request[$key] = trim(htmlentities(htmlspecialchars($field)));
    }
    return $request;
}

function formValidation($request , $nameLength=3 , $passwordLength=6 , $allowedValues=['male','female']){
    //check form validation and make error phrases  
    //return array [bool isValid(true if valid) , string error () ]    
    $status= ['isValid'=>true , 'error'=>''];  
    if (empty($request['name'])){
        $status['isValid']=false;
        $status['error']='Name field is empty';
    }elseif(strlen($request['name']) < $nameLength){
        $status['isValid']=false;
        $status['error']="Name should be at lest $nameLength Characters";
    }elseif(!filter_var($request['email'] ,FILTER_VALIDATE_EMAIL )){
        $status['isValid']=false;
        $status['error']='Invalid Email Address';
    }elseif(!in_array($request['gender'] , $allowedValues)){
        $status['isValid']=false;
        $status['error']='Gender '.$request['gender'].' is not allowed';
    }elseif(empty($request['phone'])){
        $status['isValid']=false;
        $status['error']='Phone field is empty';
    }elseif(strlen($request['password']) < $passwordLength){
        $status['isValid']=false;
        $status['error']="Password length should be greater than $passwordLength";
    }
    return $status; 
}

function addRecord($fileName , $data){
    //conver data record to json then append it to the data file 
    //return user id 
    $data['id'] = rand(10000,100000);
    if (!file_exists($fileName)){
        $toJSON = json_encode([$data] , true);
        file_put_contents($fileName , $toJSON);
    }else {
        //hash password before recored
        $data['password'] = md5($request['pasword']); 
        //
        $read = file_get_contents($fileName);
        $fromJSON = json_decode($read,'true');
        $fromJSON[] = $data;
        $toJSON = json_encode($fromJSON , true);  
        file_put_contents($fileName , $toJSON);
    }
    return $data['id'];
}

/********** REQUEST ********/
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = formSantizing($_POST);
    $validation =formValidation($data) ;//parameter [data , name length , password length , allowedvalue]
    if($validation['isValid']){
       $id = addRecord('data.json',$data);
       header("location:profile.php?id=$id");
    }else {
        echo '<h3>'.$validation['error'].'</h3><br><a href="index.php">Back to Home Page</a>';
    }
}
?>