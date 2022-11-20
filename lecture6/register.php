<?php 

/*### FUNCTIONS ###*/
//santizing
function santizing($request){
    foreach ($request as $key=>$value){
        if ($key != 'pw' &&  $key !='cpw'){
            $request[$key]=trim(htmlentities(htmlspecialchars($value)));
        }else{
            $request[$key]=htmlentities(htmlspecialchars($value));
        }
    }
    return $request; 
}

//validation 

//email dubplication check 
function isEmailDublicte($email){
    $data = json_decode(file_get_contents('database'),true); 
    foreach ($data as  $record){
        if ($record['email'] === $email){return true;}
    }
    return false; 
}

function validation ($request){
    
    //field required
    $isValid=['valid'=>true , 'error'=>''];
    if (empty($request['un'])  ||  empty($request['pw']) || empty($request['email'])){
        $isValid['valid']=false;
        $isValid['error']='Some field is empty (All fields is require)';
    }
    
    //email validation  
    elseif (!filter_var($request['email'] ,FILTER_VALIDATE_EMAIL)){
        $isValid['valid']=false; 
        $isValid['error']='Invalid Email Address'; 
    }elseif(isEmailDublicte($request['email'])){
        $isValid['valid']=false; 
        $isValid['error']=$request['email'] . ' is already registerd'; 
    }

    //password validation 
    elseif ($request['pw'] != $request['cpw']){
        $isValid['valid']=false; 
        $isValid['error']='Confirm password dosen\'t match the password'; 
    }elseif(strlen($request['pw']) < 6){
        $isValid['valid']=false; 
        $isValid['error']='Password should be at least 6 characters'; 
    }
    return $isValid; 
}

//add record to database [data file]
function addRecord($fileName , $data){

    //exclude confirm password and sumbit values from data 
    unset($data['cpw'] , $data['submit']);
    
    //hashing password
    $data['pw'] = md5($data['pw']); 
    
    //record process
    $id=1;  
    if (!file_exists($fileName)){
        $data['id']=$id;
        $record[]=$data; 
        $JSONString = json_encode($record , true); 
        file_put_contents($fileName , $JSONString); 
    }else{
        $record =json_decode(file_get_contents($fileName) , true); 
        //add id to user [incermet id]
        $id = end($record)['id']+1;
        $data['id'] = $id; 
        $record []=$data; 
        $JSONString = json_encode($record , true); 
        file_put_contents($fileName , $JSONString); 
    }
    return $data['id']; 
}

//registration action
function registration ($request){
    $data = santizing($request);
    $isValid= validation($request);
    if($isValid['valid']){
        //redirect after register 
        $id = addRecord('database', $data); 
        $_SESSION['id']=$id; 
        header('location: profile.php'); 
    }
    return $isValid;
}


/*### SERVER ###*/
session_start(); 

if ($_SERVER['REQUEST_METHOD']==='POST'){
    echo "<pre>"; 
    if ($_POST['submit'] === 'register'){
        $register =registration($_POST) ;
        if (!$register['valid']){
            echo '<h3>ERROR: '.$register['error'].'</h3>'; 
        }; 
    }
}
?>
