<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lecture 5 Task</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            border: 1px solid black ;
            border-radius: 10px;
            width: 40%;
            min-width: 400px;
            margin: auto 30%;
            padding: 2%;
            background-color: lightgray;
        }
        form >  div > label {
            display : inline-block;
            min-width: 20%;
            margin: 1% auto ; 
        }
        form > div > input , form > div > select{
            width: 76%;
            box-sizing: border-box;
        }
        form > input[type="submit"] {
        width: 96%;
        margin: 2% 2%;
        }
    </style>
</head>
<body>
   <form action="register.php" method="post">
    <div>
        <label for="">Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="">Email</label>
        <input type="text" name="email">
    </div>
    <div>
        <label for="">Gender</label>
        <select name="gender" id="">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>
    <div>
        <label for="">Phone</label>
        <input type="text" name="phone">
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password">
    </div>
        <input type="submit" value="Save">
   </form>
</body>
</html>