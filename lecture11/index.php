<?php

//required by Eng.Mohamed Amr

include('validation.php'); 
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $validation  = new validation; 
    $valid_ = $validation->require($_POST['field'])->min((int)$_POST['min'])->max((int)$_POST['max']); 
    $valid = $valid_->isValid(); 
    $errors = $valid_->showErrors(); 
}else {
    $valid ='';
    $errors = []; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
        <label for="field">Field to Check</label>
        <input type="text" name="field" placeholder ="require field"><br><br>
        <label for="require">min</label>
        <input type="number" name="min" required ><br><br>
        <label for="">max</label>
        <input type="number" name="max" required><br><br>
        <input type="submit" value="Check">
    </form><br><br>
    <label for="">Validation :  <?=($valid)?'Valid':'not Valid';?></label><br><br>
    <label for="">Errors:</label><br>
    <ul>
    <?php
    foreach($errors as $error){
       echo  "<li>$error</li>"; 
    }
    ?>
    </ul>

    
</body>
</html>
<?php



