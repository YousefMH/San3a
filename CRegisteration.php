<?php
    include "DBconn/conn.php";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        } //  function to sanitizes data user input

    if(isset($_POST["btnRegister"])){ // When button clicked
        if(isset($_POST["fname"]) && isset($_POST["sname"]) && isset($_POST["email"]) && isset($_POST["NID"]) && isset($_POST["pass"])) {// Checks if users entered the data in the inputs
            $fname = test_input($_POST["fname"]);
            $sname = test_input($_POST["sname"]);
            $email = test_input($_POST["email"]);
            $NID = test_input($_POST["NID"]);
            $pass = test_input($_POST["pass"]);
            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT); // Create password hash from the entered password

            $checkIfUserExitsQuery = "SELECT email FROM users WHERE email = '$email'";
            $result = mysqli_query($conn,$checkIfUserExitsQuery);

            if(mysqli_num_rows($result) == 0){    // Checks the number of users exists in the DB, if there is no users with the same email: the code contenues/ if not: tells users that he is already exist
                $query = "INSERT INTO users(email,password,first_name,last_name) VALUES('$email','$hashedPassword','$fname','$sname')";
                if (mysqli_query($conn, $query)) {
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Error: " . mysqli_error($conn); // Just for testing
                }
            }else{
                echo '<div style="padding: 20px; border: 2px solid #f44336; border-radius: 5px; background-color: #f8d7da; color: #721c24; font-family: Arial, sans-serif; direction: rtl; text-align: right;">
                <strong>مستخدم موجود</strong> لديك بالفعل حساب مسجل في موقعنا 
                <a href="index.php" style="color:rgb(90, 31, 255); text-decoration: none; font-weight: bold;">سجل دخول من هنا: </a>
            </div>';
            }
        }else{
            echo "<script>alert('You Must Fill All Inputs');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عميل</title>
    <link rel="stylesheet" href="./style/Customer.css">
</head>

<body>
<div class="container">
    <form method="POST" onsubmit="return validatePassword()">
        <div class="register-container">
            <h2>  إنشاء حساب عميل </h2>
            <input type="text" placeholder="أدخل الاسم الأول" name="fname" required>
            <input type="text" placeholder="أدخل الاسم الثاني" name="sname" required>
            <input type="email" placeholder="أدخل البريد الإلكتروني" name="email" required>
            <input type="text" placeholder="أدخل الرقم القومي" name="NID" required>
            <div class="form-group">
            <input type="password" id="password1" placeholder="أدخل كلمة المرور" name="pass" required>
            </div>
            <div class="form-group">
            <input type="password" placeholder="أعد إدخال كلمة المرور" id="password2" oninput="checkPasswordMatch()" name ="Cpass" required>
            </div>
            <button class="register-btn" type="submit" name="btnRegister">إنشاء حساب</button>
        </div>
    </form>
</div>
<script>
        function checkPasswordMatch() {
            var password1 = document.getElementById("password1").value;
            var password2 = document.getElementById("password2").value;
            var message = document.getElementById("passwordMessage");

            if (!message) {
                message = document.createElement("p");
                message.id = "passwordMessage";
                document.getElementById("password2").parentNode.appendChild(message);
            }

            if (password1 === password2 && password1 !== "") {
                message.style.color = "green";
                message.textContent = "كلمتا المرور متطابقتان!";
            } else if (password2 !== "") {
                message.style.color = "red";
                message.textContent = "كلمتا المرور غير متطابقتين!";
            } else {
                message.textContent = "";
            }
        }

        function validatePassword() {
            var password1 = document.getElementById("password1").value;
            var password2 = document.getElementById("password2").value;

            if (password1 !== password2) {
                alert("كلمتا المرور غير متطابقتين! الرجاء التأكد من إدخال نفس كلمة المرور.");
                return false;
            }
            return true; 
        }
    </script>

</body>
</html>