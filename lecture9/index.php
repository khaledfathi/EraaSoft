<?php 
//database 
define ('HOST', 'localhost'); 
define ('USER', 'root'); 
define ('PASSWORD', ''); 
define ('DATABASE', 'db'); 

//session
session_start(); 

/*FUNCTIONS*/
function createDB (){
    $db = new mysqli(HOST , USER , PASSWORD); 
    $sql = "CREATE DATABASE IF NOT EXISTS `db`; 
        use `db`; 
        CREATE TABLE  IF NOT EXISTS `category` (
            id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL UNIQUE); ";
    $db->multi_query($sql);  
    $db->close(); 
}

function addCategory($categoryName){
    $response = ['state'=>false , 'msg'=>''];
    if (empty ($categoryName)){
        $response['msg'] ='Error : Filed Name is Empty!'; 
        return $response; 
    }
    $categoryName = trim (htmlentities(htmlspecialchars($categoryName) ));
    $db= new mysqli(HOST , USER , PASSWORD , DATABASE);
    $queryResult = $db->query("SELECT name FROM `category` WHERE name='$categoryName'"); 
    //check duplications
    if (count($queryResult->fetch_all())){
        $response['msg'] = "Category \"$categoryName\" is already exist! " ; 
    }else{
        $db->query("INSERT INTO `category` (name) VALUES ('$categoryName')") ; 
        $response['state'] = true;   
        $response['msg'] = "Category \"$categoryName\" has been added Successfuly." ; 
    }
    $db->close(); 
    return $response; 
}

function search($find , $pattern){
    $response = ['state'=>false , 'msg'=>'', 'data'=>NULL];
    if(empty($find)) {
        $response['msg']='Search Filed is empty!';
        return $response; 
    }
    $find = trim (htmlentities(htmlspecialchars($find)));
    $db = new mysqli(HOST , USER , PASSWORD , DATABASE);  
    if($find == '***'){$pattern='all';}
    switch ($pattern){
        case 'all':
            $sql = "SELECT * FROM `category` ORDER BY id"; 
            break; 
        case 'contain':
            $sql = "SELECT * FROM `category` WHERE name LIKE  '%$find%' ORDER BY id "; 
            break; 
        case 'startWith':
            $sql = "SELECT * FROM `category` WHERE name LIKE '$find%' ORDER BY id "; 
            break; 
        case 'endWith':
            $sql = "SELECT * FROM `category` WHERE name LIKE '%$find' ORDER BY id "; 
            break; 
        case 'exact':
            $sql = "SELECT * FROM `category` WHERE name='$find' ORDER BY id "; 
            break; 
    }
    $queryResult = $db->query($sql);
    $response['data'] = $queryResult->fetch_all();  
    $response['state']=true;
    $db->close(); 
    return $response; 
}

function delete ($ids , $multi=false){
    $db = new mysqli(HOST , USER , PASSWORD , DATABASE); 
    if ($multi){
        foreach ($ids as $id){
            $db->query("DELETE FROM `category` WHERE id=$id");
        }
    }else {
        $db->query("DELETE FROM `category` WHERE id=$ids");
    }
    $db->close();
}

function edit ($id , $categoryName){
    $response = ['state'=>false , 'msg'=>''];
    $categoryName = trim (htmlentities(htmlspecialchars($categoryName)));
    if (empty($categoryName)){
        $response['msg']= 'There is nothing to change!'; 
        return $response;
    }
    $db = new mysqli(HOST , USER , PASSWORD , DATABASE); 
    //check if name dublicated ; 
    $queryResult = $db->query("SELECT name FROM `category` WHERE name='$categoryName'"); 
    if (count($queryResult->fetch_all())){
        $response['msg']= "Category \"$categoryName\" is already exist!";
        return $response;  
    }
    //update
    $db->query("UPDATE `category` SET name='$categoryName' WHERE id=$id; ");
    $response['state'] = true; 
    $response['msg']= "Category Number  \"$id\" has been changed its name to \"$categoryName\"";
    $db->close();
    return $response; 
}

/*SERVER*/
$currentSection=''; 
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $currentSection = ''; 
    createDB(); 
    if (isset($_POST['submit']) && $_POST['submit']==='Add'){
        $currentSection='addCategoryName'; 
        $newCategory = addCategory($_POST['categoryName']);
    }elseif (isset($_POST['submit']) && $_POST['submit']==='Search'){
        $_SESSION['lastQuery']=['searchField'=>$_POST['searchField'] , 'searchPattern'=>$_POST['searchPattern']]; 
        $currentSection='search'; 
        $find = search($_POST['searchField'] , $_POST['searchPattern']);
    }elseif(isset ($_POST['case']) ){
        $lastQuery = $_SESSION['lastQuery']; 
        $case= json_decode($_POST['case'] , true );
        if (isset($case['button']) && $case['button'] == 'Delete'){
            $currentSection='updateTable'; 
            delete($case['id']); 
            $find = search($lastQuery['searchField'] , $lastQuery['searchPattern']);
        }elseif (isset($case['button']) && $case['button'] == 'Delete All'){
            $currentSection='deleteAll'; 
            delete($case['ids'] , true); 
        }elseif (isset ($case['button']) && $case['button']=='Edit'){
            $currentSection='editTable'; 
            $edit = edit($case['id'] , $case['editValue']);            
            $find = search($lastQuery['searchField'] , $lastQuery['searchPattern']);
        }
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Task(Lecture 9)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table{
            border :1px solid black; 
            border-collapse:collapse; 
        }
        td , th {
            border : 1px solid black; 
        }
        input {
            margin: 10px ; 
    }</style>
</head>
<body>
    <div class="container">
        <div>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="">New Category</label>
                <input name="categoryName" type="text">
                <input name="submit" type="submit" value='Add'>
            </form>
            <?php echo ($currentSection=='addCategoryName') ? $newCategory['msg'] : ''; ?>
        <div>
        <hr>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <div>
                <label for="">Search</label>
                <input name="searchField" type="text" placeholder="type *** to show whole table">
            </div>
            <div>
                <label for="">Pattern</label>
                <select id="" name="searchPattern">
                    <option value ="contain" >Contain</option>
                    <option value = "startWith" >Start with</option>
                    <option value = "endWith" >End with</option>
                    <option value = "exact">Exact </option>
                </select>
            </div>
            <input name="submit" type="submit" value="Search">
        </form>
        <hr>
        <div class="result">
        <?php 
        if ($currentSection=='search' || $currentSection == 'updateTable' || $currentSection == 'editTable'){
            if ($find['state']){
                echo '
                    <form action='.$_SERVER['PHP_SELF'].' method="post">
                        <input id = "deleteAll" type="submit" value="Delete All">
                        <input id="case" name="case" type="hidden"> 
                    <table id="resTable">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>';
                foreach ($find['data'] as $row){
                    echo "<tr value=$row[0]>".
                            "<td>".$row[0]."</td>".
                            "<td><input type='text' value='".$row[1]."'></td>".
                            "<td><input type='submit' value='Edit'></td>".
                            "<td><input type='submit' value='Delete'></td>".
                        "</tr>";
                }
                echo '</table> </form>';
                if ($currentSection == 'editTable'){
                    echo"<p>".$edit['msg']."</p>"; 
                }
            }else{
            
                echo "<p>".$find['msg']."</p>"; 
            }
        }elseif ($currentSection=='deleteAll'){
            echo "<p>All categories has been deleted!</p>"; 
        }
        ?>
        </div>
    </div>
</body>
<script>
    const resTable = document.querySelector('#resTable'); 
    const case_ = document.querySelector('#case');
    const deleteAll = document.querySelector('#deleteAll'); 
    var  data ={ button:'' , id:'' , ids:[] , editValue:'' }; 

    resTable.addEventListener('click', (event)=>{
        let clicked = event.target; 
        if (clicked.value== 'Delete'){
           data.id = clicked.parentElement.parentElement.getAttribute('value');
           data.button = clicked.value; 
           case_.value= JSON.stringify(data) ; 
        }else if (clicked.value== 'Edit'){
            data.id = clicked.parentElement.parentElement.getAttribute('value');
            data.editValue=clicked.parentElement.parentElement.children[1].children[0].value; 
            data.button = clicked.value; 
            case_.value= JSON.stringify(data) ; 
        }

    }); 
    deleteAll.addEventListener('click', ()=>{
        let ids= []; 
        let row = resTable.children[1].children
        for (let i=0 ; i<row.length; i++ ){
            ids.push (row[i].children[0].innerHTML); 
        }
        data.button=deleteAll.value; 
        data.ids=ids;
        case_.value= JSON.stringify(data) ; 
    });
</script>
</html>
