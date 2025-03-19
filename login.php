<?php
include("conn.php");
$email=$_Post["email"];
$emailerror=$password="";
$password=$_POST["password"];
$query="SELECT email,password FROM users WHERE email=$email AND passwrod=$password";
mysqli_query($conn,$query);
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
    <body>
        <form action="home.php" method="post">
            <label for="">email</label>
            <input type="email" name="email" id="">
            <label for></label>
            <input type="password" name="password" id="">
            <input type="submit" value="submit">
        </form>
    </body>
</html>