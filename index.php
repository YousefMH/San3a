<?php
    session_start(); 
    include "DBconn/conn.php";
    if(isset($_POST["btnLogin"])){ // If button clicked
        if(isset($_POST["email"]) && isset($_POST["pass"])){ // make sure that the inputs have values
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $SelectPasswordQuery = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn,$SelectPasswordQuery);
            if(mysqli_num_rows( $result) > 0){
                $row = mysqli_fetch_assoc($result);
                $DbPassword = $row['password'];

                if(password_verify($pass,$DbPassword)){ // Compare the hashed password in DB with given password in the login page (if true gives 1)
                    $_SESSION['ID'] = $row['user_id'];
                    $_SESSION['fname'] = $row['first_name'];
                    $_SESSION['role'] = $row['user_type'];
                    $DbRole = $_SESSION['role'];

                    if($DbRole == "client"){
                        header("Location:Home.php"); // Redirect to home page if the password is correct and user is client
                        exit();
                    }else{
                        header("Location:Control.php"); // Redirect to control page if the password is correct and user is technician
                        exit();
                    }
                }else{
                    echo '<div style="padding: 20px; border: 2px solid #f44336; border-radius: 5px; background-color: #f8d7da; color: #721c24; font-family: Arial, sans-serif; direction: rtl; text-align: right;">
                                <strong>خطأ</strong> كلمة المرور غير صحيحة
                        </div>';
                }
            }else{
                echo '<div style="padding: 20px; border: 2px solid #f44336; border-radius: 5px; background-color: #f8d7da; color: #721c24; font-family: Arial, sans-serif; direction: rtl; text-align: right;">
                <strong>المستخدم غير موجود</strong> هذا المستخدم غير موجود في الموقع
                <a href="CRegisteration.php" style="color:rgb(90, 31, 255); text-decoration: none; font-weight: bold;">أنشئ حساب من هنا:</a>
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
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <div class="login-container">
        <div id="error"></div>
        <form id="form" method="POST">
            <h2>تسجيل الدخول</h2>
            <input id="phone" class="phone" type="email" placeholder="أدخل البريد الإلكتروني" name="email" required>
            <input id="password" class="phone" type="password" placeholder="أدخل كلمة المرور" name="pass" required>
            <button class="login-btn" type="submit" name="btnLogin">تسجيل الدخول</button>
            
            <div class="new-account" dir="rtl">
                <a href="select.php">حساب جديد</a>
                <a href="#">نسيت الباسورد</a>
            </div>
        </form>
    </div>  
</body>
</html>