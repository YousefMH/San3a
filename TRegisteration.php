<?php
include "DBconn/conn.php";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["btnRegister"])) {
    if (isset($_POST["fname"]) && isset($_POST["sname"]) && isset($_POST["email"]) && isset($_POST["NID"]) && isset($_POST["pass"]) && isset($_POST["specialty"]) && isset($_POST["area"]) && isset($_POST["province"])) {
        $fname = test_input($_POST["fname"]);
        $sname = test_input($_POST["sname"]);
        $email = test_input($_POST["email"]);
        $NID = test_input($_POST["NID"]);
        $pass = test_input($_POST["pass"]);
        $specialty = test_input($_POST["specialty"]);
        $area = test_input($_POST["area"]);
        $province = test_input($_POST["province"]);
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        $checkIfUserExitsQuery = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $checkIfUserExitsQuery);

        if (mysqli_num_rows($result) == 0) {
            $CreateUserQuery = "INSERT INTO users(email,password,first_name,last_name,user_type) VALUES('$email','$hashedPassword','$fname','$sname','technician')";
            if (mysqli_query($conn, $CreateUserQuery)) {
                $lastUserId = mysqli_insert_id($conn);
                $CreateTechQuery = "INSERT INTO technicians(user_id,specialty,area,province) VALUES('$lastUserId','$specialty','$area','$province')";
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
                <a href="index.php" style="color:rgb(90, 31, 255); text-decoration: none; font-weight: bold;">سجل دخول من هنا: </a>
                </div>';
        }
    } else {
        echo '<div style="padding: 20px; border: 2px solid #f44336; border-radius: 5px; background-color: #f8d7da; color: #721c24; font-family: Arial, sans-serif; direction: rtl; text-align: right;">
        <strong>خطأ</strong> تأكد من إدخال جميع البيانات بشكل صحيح
        </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فني</title>
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
    <link rel="stylesheet" href="./style/Technical.css">
    <style>
        .menu {
            margin: 10px;
            padding: 10px;
            background-color: #f0b22b;
            border: none;
            padding: 5px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 20px;
            font-family: "Tajawal", sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <form method="POST">
        <div class="register-container">
            <h2>إنشاء حساب فني</h2>
            <input type="text" placeholder="أدخل الاسم الأول" name="fname" required>
            <input type="text" placeholder="أدخل الاسم الثاني" name="sname" required>
            <input type="email" placeholder="أدخل البريد الإلكتروني" name="email" required>
            <input type="text" placeholder="أدخل الرقم القومي" name="NID" required>
            <input type="password" id="password1" placeholder="أدخل كلمة المرور" name="pass" required>
            <input type="password" id="password2" placeholder="أعد إدخال كلمة المرور" oninput="checkPasswordMatch()" name="Cpass" required>

            <select name="specialty" id="specialty" required class="menu">
                <option value="" disabled selected>اختر التخصص</option>
                <option value="كهربائي">كهربائي</option>
                <option value="نجار">نجار</option>
                <option value="سباك">سباك</option>
                <option value="حداد">حداد</option>
                <option value="نقاش">نقاش</option>
            </select>

            <select name="province" id="province" required class="menu" onchange="updateAreas()">
                <option value="" disabled selected>اختر المحافظة</option>
                <option value="القاهرة">القاهرة</option>
                <option value="الجيزة">الجيزة</option>
            </select>

            <select name="area" id="area" required class="menu">
                <option value="" disabled selected>اختر المنطقة</option>
            </select>

            <button class="register-btn" type="submit" name="btnRegister" onclick="return validatePassword()">إنشاء حساب</button>
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
        }

        const areasByProvince = {
            "القاهرة": ["التجمع الخامس", "الرحاب", "مدينتي"],
            "الجيزة": ["فيصل", "أكتوبر", "الهرم", "زايد"]
        };

        function updateAreas() {
            const provinceSelect = document.getElementById("province");
            const areaSelect = document.getElementById("area");
            const selectedProvince = provinceSelect.value;

            areaSelect.innerHTML = '<option value="" disabled selected>اختر المنطقة</option>';

            if (areasByProvince[selectedProvince]) {
                areasByProvince[selectedProvince].forEach(area => {
                    const option = document.createElement("option");
                    option.value = area;
                    option.textContent = area;
                    areaSelect.appendChild(option);
                });
            }
        }
    </script>
</body>

</html>