<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>Upload Image PHP file</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <input type="submit" value="Upload">
    </form><br>
    <?php        
        $img = $_FILES['img'];
        if ($img){            
            if ($img['name']){
                move_uploaded_file($img['tmp_name'] , $img['name']);
            echo "File Uploaded Successfully"; 
            }else {
                echo "No File to Upload!";
            }            
        }   
    ?>    
</body>
</html>