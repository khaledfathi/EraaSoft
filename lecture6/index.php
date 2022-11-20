<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>
        <form action="register.php" method="post">
            <div>
                <label for="">User Name</label>
                <input type="text" name="un">
            </div>
            <div>
                <label for="">Email</label>
                <input type="text" name="email">
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="pw">
            </div>
            <div>
                <label for="">Confirm Password</label>
                <input type="password" name="cpw">
            </div>
            <input type="submit" name="submit" value="register" >
        </form>
    </div>
    <div>
        <a href="login.php">Login</a>
    </div>
</body>
</html>
