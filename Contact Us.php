<?php
session_start();
include "DBconn/conn.php";
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}
include("DBconn/conn.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone_num = $_POST['phone_num'];
    $problem_message = $_POST['problem_message'];
    $sql = "INSERT INTO contact_us (name, phone_num, problem_message) 
            VALUES ('$name', '$phone_num', '$problem_message')";
    mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="./style/Contact Us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <?php include "header.html"; ?> <!-- header -->


    <div class="support-form">
        <h2> هل تحتاج إلي المساعدة ؟</h2>
        <form method="post">
            <div class="name">
                <input type="text" placeholder="الاسم بالكامل" required name="name">
            </div>

            <div class="phone">
                <input type="tel" placeholder="رقم الهاتف (يدعم واتس آب)" required name="phone_num">
            </div>


            <div class="problem">
                <textarea placeholder="اكتب لنا مشكلتك ..." name="problem_message"></textarea>
            </div>

            <div class="submit">
                <button type="submit" name="submit" onclick="show_alter()">إرسال</button>
            </div>
        </form>
    </div>

    <script>
        function navigateToPage(value) {
            if (value) {
                window.location.href = value;
            }
        }

        function show_alter() {
            alert("تم تسجيل مشكلتك بنجاح");
        }
    </script>

</body>

</html>