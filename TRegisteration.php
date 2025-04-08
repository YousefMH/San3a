<?php
include "DBconn/conn.php";

// دالة لتنظيف البيانات
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["btnRegister"])) {
    if (
        isset($_POST["fname"]) &&
        isset($_POST["sname"]) &&
        isset($_POST["email"]) &&
        isset($_POST["NID"]) &&
        isset($_POST["pass"]) &&
        isset($_POST["Cpass"])
    ) {
        $fname = test_input($_POST["fname"]);
        $sname = test_input($_POST["sname"]);
        $email = test_input($_POST["email"]);
        $NID = test_input($_POST["NID"]);
        $pass = test_input($_POST["pass"]);
        $Cpass = test_input($_POST["Cpass"]);

        // التحقق من تطابق كلمتي المرور
        if ($pass !== $Cpass) {
            echo "<script>alert('كلمتا المرور غير متطابقتين!');</script>";
            return;
        }

        // التحقق من قوة كلمة المرور
        if (strlen($pass) < 8) {
            echo "<script>alert('كلمة المرور يجب أن تكون 8 أحرف على الأقل!');</script>";
            return;
        }

        // تشفير كلمة المرور
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        // التحقق من وجود المستخدم مسبقًا
        $checkIfUserExistsQuery = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $checkIfUserExistsQuery);

        if (mysqli_num_rows($result) == 0) {
            // رفع الصور
            $frontIDPath = "";
            $backIDPath = "";

            if (isset($_FILES["frontID"]) && $_FILES["frontID"]["error"] == 0) {
                $frontIDPath = "uploads/" . basename($_FILES["frontID"]["name"]);
                move_uploaded_file($_FILES["frontID"]["tmp_name"], $frontIDPath);
            }

            if (isset($_FILES["backID"]) && $_FILES["backID"]["error"] == 0) {
                $backIDPath = "uploads/" . basename($_FILES["backID"]["name"]);
                move_uploaded_file($_FILES["backID"]["tmp_name"], $backIDPath);
            }

            // إنشاء المستخدم
            $CreateUserQuery = "INSERT INTO users(email, password, first_name, last_name, user_type) 
                                VALUES('$email', '$hashedPassword', '$fname', '$sname', 'technician')";
            if (mysqli_query($conn, $CreateUserQuery)) {
                $lastUserId = mysqli_insert_id($conn);

                // إضافة بيانات الفني
                $CreateTechQuery = "INSERT INTO technicians(user_id, nid, id_front, id_back) 
                                    VALUES('$lastUserId', '$NID', '$frontIDPath', '$backIDPath')";
                if (mysqli_query($conn, $CreateTechQuery)) {
                    header("Location: index.php");
                    exit();
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo '<div style="padding: 20px; border: 2px solid #f44336; border-radius: 5px; background-color: #f8d7da; color: #721c24; font-family: Arial, sans-serif; direction: rtl; text-align: right;">
                    <strong>مستخدم موجود</strong> لديك بالفعل حساب مسجل في موقعنا 
                    <a href="index.php" style="color:rgb(90, 31, 255); text-decoration: none; font-weight: bold;">سجل دخول من هنا</a>
                  </div>';
        }
    } else {
        echo "<script>alert('يجب تعبئة جميع الحقول!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فني</title>
    <link rel="stylesheet" href="./style/Technical.css">
</head>

<body>
    <form method="POST" enctype="multipart/form-data" onsubmit="return validatePassword()">
        <div class="register-container">
            <h2>إنشاء حساب فني</h2>
            <input type="text" placeholder="أدخل الاسم الأول" name="fname" required>
            <input type="text" placeholder="أدخل الاسم الثاني" name="sname" required>
            <input type="email" placeholder="أدخل البريد الإلكتروني" name="email" required>
            <input type="text" placeholder="أدخل الرقم القومي" name="NID" required>
            <input type="password" id="password1" placeholder="أدخل كلمة المرور" name="pass" required>
            <input type="password" id="password2" placeholder="أعد إدخال كلمة المرور" name="Cpass" oninput="checkPasswordMatch()" required>

            <label class="upload-label">صورة البطاقة الشخصية (وجه)</label>
            <input type="file" name="frontID" accept="image/*" required>

            <label class="upload-label">صورة البطاقة الشخصية (الظهر)</label>
            <input type="file" name="backID" accept="image/*" required>

            <button class="register-btn" type="submit" name="btnRegister">إنشاء حساب</button>
        </div>
    </form>

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

            if (password1.length < 8) {
                alert("كلمة المرور يجب أن تكون 8 أحرف على الأقل!");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
