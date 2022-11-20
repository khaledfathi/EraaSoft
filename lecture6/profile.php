<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
        <?php
        session_start(); 
        if(isset($_SESSION['id']) ){
            $data = file_get_contents('database'); 
            $JSONString = json_decode($data , true); 
            foreach ($JSONString as $record){
                if ($record['id'] == $_SESSION['id']){
                    echo "<h1>Your Profile.</h1>
                            <h3>Your Account Informations : </h3>
                            <table>
                                <thead>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                </thead>
                        <tr>
                        <td>".$record['id']."</td>
                        <td>".$record['un']."</td>
                        <td>".$record['email']."</td>
                        </tr>";
                    break; 
                }
            }
        }else {
            header('location: login.php');
        }
        ?>
    </table>
</body>
</html>

