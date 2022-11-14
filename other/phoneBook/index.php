<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <link rel="stylesheet" href="style.css">
    <title>Code</title>    
</head>
<body>
    <div class = "c1r1">
        <form class="register" action="" method="POST" enctype="multipart/form-data">
            <h1>New Contact</h1>
            <div>
                <label>Name</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label for="">phone</label>
                <input type="text" name="phone" required>
            </div>
            <div>
                <label for="">Address</label>
                <input type="text" name="address">
            </div>
            <div>
                <label for="">Image</label>
                <input type="file" id="photo" name="photo" accept="image/png , image/jpeg" >
            </div>                
            <img  alt="photo" id="img">
            <input type="submit" value="save">
            <input type="hidden" name="action" value="register">
        </form>
    </div>
        
    <div class = "c2r1">
        <h1>Search</h1>
        <form class="search"  method="post">
            <div>
                <div>
                    <input type="radio" id="byName" name="searchType" value="byName" checked="checked"> 
                    <label for="byName">By Name</label>
                </div>
                <div>
                    <input type="radio" id="byPhoneNo" name="searchType" value="byPhone">
                    <label for="byPhoneNo" name="byPhone" >By Phone Number</label>
                </div>
            </div>
            <div>
                <label for="" >Search for </label>
                <input type="text" name="query" placeholder="to show all : type ***">
            </div>            
            <input type="submit" value="Search">            
            <input type="hidden" name="action" value="search">
        </form>
        
    </div>

    <div class ="result">
        <?php
            $fileName = 'db.txt';        
            //check file or create new one
            if (!file_exists($fileName)){
                fopen($fileName,'w');
                fclose($fileName);
            }
            
            //search function 
            function query ($fileName , $queryBy , $find){
                $file = fopen($fileName , 'r'); 
                if ($queryBy === "byName"){
                    $index = 0; 
                }elseif ($queryBy === "byPhone"){
                    $index = 1; 
                }else {
                    return []; 
                }
                $queryResult=[];
                while (!feof($file)){
                    $line = fgets($file);
                    if ($line){
                        $row = explode(';',$line);  //line by line
                        if ($find === $row[$index] || $find === "***"){
                            array_push($queryResult , $row[0],$row[1], $row[2], $row[3]);
                        }
                    }
                }                
                fclose($file);
                return $queryResult; 
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                if ($_POST['action'] === "register"){
                    //register
                    //check duplicated number first
                    $isDuplicated  = query ($fileName , 'byPhone' , $_POST['phone']);
                    //check  ';' in inputs                    
                    $isSperatorInStr = str_contains($_POST['name'], ';') ||  str_contains($_POST['phone'], ';') ||  str_contains($_POST['address'], ';')  ;                    
                    //check if inputs empty spaces 
                    $isStrSpaceOnly = ctype_space($_POST['name']) || ctype_space($_POST['phone']);
                                                            
                    if ($isDuplicated || $isSperatorInStr || $isStrSpaceOnly){
                        echo ($isDuplicated ) ? " <h4>Number  \"".$_POST['phone']."\" is Duplicated!</h4>" : "";
                        echo ($isSperatorInStr ) ? " <h4>';' is not allowed</h4>" : "";
                        echo ($isStrSpaceOnly) ? " <h4> name or phone should not be spaces</h4>" : "";
                        echo "<h4>Record is not saved.</h4>";
                    }else {
                        //start Recording
                        $file = fopen($fileName,'a');
                        $string = "";
                        foreach ($_POST as $key => $field){
                            if ($key != "action") $string.= trim($field , ' ').";";
                        }
                        //upload photo if exist 
                        if ($_FILES['photo']['name']){
                            $extension = end(explode('/', $_FILES['photo']['type'])) ; 
                            $newName = $_POST['phone'] .".". $extension;
                            move_uploaded_file($_FILES['photo']['tmp_name'] , "photo/".$newName);
                            //add photo path
                            $string.= "photo/".$newName.";";
                        }else {
                            $string.="No Photo;"; 
                        }                                        
                        $string.= "\n";
                        fwrite($file , $string);
                        fclose($file);
                        echo "<h3>Record is Saved</h3>";
                    }
                                                            
                }else if ($_POST['action'] === "search"){
                    //search                    
                    $data = query($fileName , $_POST['searchType'] , $_POST['query']);                    
                    if ($data){
                        echo "<table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <tbody>";
                    for ($i=0; $i<count($data); $i+=4){
                        echo "<tr>
                        <td>".$data[$i]."</td>
                        <td>".$data[$i+1]."</td>
                        <td>".$data[$i+2]."</td>
                        <td><img class='imgInTable' src='".$data[$i+3]."' alt='".$data[$i+3]."'></td>";
                    }
                    echo "</tbody>
                        </table";
                    }else {                        
                        echo ($_POST['searchType']==="byNumber") ? 
                        "<h3>There is no matched number</h3>" : 
                        "<h3>There is no matched name</h3>";
                    }                    
                }
            }
        ?>
    </div>    
    <script src="js.js" ></script>    
</body>
</html>
