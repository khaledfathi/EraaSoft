<?php

//Constant  
define ('HOST','localhost') ; 
define ('USER','root') ; 
define ('PASSWORD','') ; 
define ('DATABASE','db') ; 

$user = 'root'; 
$password = ''; 
$database = 'db'; 

//response [send response to client]
function response ($data){
    header('Content-type: application/json');
    echo json_encode($data , true);
}


//Database 
try {
    $db= new mysqli(HOST , USER , PASSWORD );
    $db->query('CREATE DATABASE IF NOT EXISTS `db`');
    $db->close();  
}catch (Exception $e){
    $data['connection']=['status'=>false , 'error'=>'Database Error : '.$e->getMessage()]; 
    response($data); 
    exit(); 
}


/*** FUCNTIONS ***/
//SQL creating tables 
function createDB (){
    $db= new mysqli(HOST , USER , PASSWORD , DATABASE); 
    $sql ="CREATE DATABASE IF NOT EXISTS `db`;

        use `db`;

        CREATE TABLE  IF NOT EXISTS `category` (id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
                                name VARCHAR(100) UNIQUE);

        CREATE  TABLE IF NOT EXISTS `courses` (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                 category_id INT NOT NULL ,
                                 name VARCHAR(100),
                                 price INT NOT NULL,
                               FOREIGN KEY (category_id) REFERENCES category(id) ON UPDATE CASCADE ON DELETE CASCADE ) ;

        CREATE TABLE IF NOT EXISTS `students` ( id INT NOT NULL  AUTO_INCREMENT PRIMARY key ,
                                name varchar (50) NOT NULL ,
                                email varchar (50) NOT NULL  UNIQUE,
                                phone varchar(50) NOT NULL );

        CREATE TABLE IF NOT EXISTS `enroll` (student_id INT NOT NULL ,
                               course_id INT NOT NULL ,
                               rate float DEFAUlT 0,
                               graduated BOOLEAN NOT NULL DEFAULT false ,
                               PRIMARY KEY (student_id , course_id) );"; 
    $db->multi_query($sql); 
    $db->close(); 
}

//on page load 
function onPageLoad(){
    $db= new mysqli(HOST , USER , PASSWORD , DATABASE); 
    $response['data']['category']=$db->query("SELECT name FROM `category`")->fetch_all(); 
    $response['data']['courses']=$db->query("SELECT courses.name , category.name , courses.price  FROM `courses` , `category`")->fetch_all(); 
    $response['data']['students']=$db->query("SELECT name , email , phone FROM `students`")->fetch_all(); 
    $db->close(); 
    response($response); 
}

//search 
function search(){
    return 0; 
}

//category 
function category($request ){
    $response = ['state'=>false , 'data'=>[] ]; 

    if ($request['action']=='create'){
        $request['categoryName'] = trim(htmlentities(htmlspecialchars($request['categoryName']) )); 
        $db= new mysqli(HOST , USER , PASSWORD , DATABASE); 
        if (!empty ($request['categoryName']) ){
            //check if category name is already exist 
            $q = $db->query("SELECT name FROM `category` WHERE name='".$request['categoryName']."'"); 
            if( $q->fetch_all()){
                $response['data']['msg'] = "Category " . $request['categoryName']." is already exist!"; 
            }else {
                $db->query("INSERT INTO `category` (name) values ('".$request['categoryName']."')"); 
                $response['state']= true ; 
                $response['data']['msg'] = 'Category Added Successfully'; 
            } 
        }else {
            $response['data']['msg'] = 'Invalid Category Name'; 
        }
        $db->close(); 

    }else if ($request['action']=='delete'){
        //delete category 
          
    }else if ($request['action']=='edit'){
        //edit category 
    }
    response($response); 
    exit(); 
}

//course 
function courses(){
    return 0 ;
}

/*** SERVER ***/
if ($_SERVER['REQUEST_METHOD']==='POST'){
    createDB();
    $request = json_decode(file_get_contents('php://input') , true ) ;
 //   print_r ($request); 

    if ($request['section']=='onload'){
        onPageLoad();
    }elseif ($request['section']=='category'){
        category($request['data'] , $db); 
    }elseif ($request['section']=='courses'){
        echo 'courses'; 
    }elseif ($request['section']=='students'){
        echo 'students'; 
    }elseif ($request['section']=='search'){
        echo 'search'; 
    }

}
?>
