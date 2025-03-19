<?php
    include("conn.php");

    if(isset($_POST["btnRegister"])){ // When button clicked
        if(isset($_POST["email"]) && isset($_POST["pass"])){ // Checks if users entered the data in the inputs
            $email = $_POST["email"];
            $password = $_POST["pass"];
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Create password hash from the entered password
            $checkIfUserExitsQuery = "SELECT email FROM users WHERE email = '$email'";
            $result = mysqli_query($conn,$checkIfUserExitsQuery);
            if(mysqli_num_rows($result) == 0){    // Checks the number of users exists in the DB, if there is no users with the same email: the code contenues/ if not: tells users that he is already exist
                $query = "INSERT INTO users(email,password) VALUES('$email','$hashedPassword')";
                if (mysqli_query($conn, $query)) {
                    echo "New record inserted successfully!";
                } else {
                    echo "Error: " . mysqli_error($conn); // Just for testing
                }
            }else{
                echo "This user already exists, go back to " . '<a href="login.php">Login Page</a>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>This is a simple Registeration Page</h1>
    <form method="POST">
        <input type="email" name="email" required>
        <input type="password" name="pass" required>
        <button type="submit" name="btnRegister">Register</button>
    </form>
</body>
</html>