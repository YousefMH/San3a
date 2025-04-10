<?php
session_start();
include "DBconn/conn.php";
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}


$name=$phone_num=$problem_message=$submit_message="";

$name_err=$phone_err=$problem_message_err="";

if (isset($_POST['submit'])) {
    $valid=false;
    
    if(empty($_POST['name'])){
        $name_err='<p class="error">الرجاء ادخال الاسم </p>';
        $has_error=true;
    }

    if(empty($_POST['phone_num']) || !is_numeric($_POST['phone_num']) ){
        $phone_err='<p class="error">الرجاء ادخال رقم الهاتف </p>';
        $valid=true;
    }

    if(empty($_POST['problem_message'])){
        $problem_message_err='<p class="error">الرجاء ادخال المشكلة </p>';
        $valid=true;
    }

    if(!$valid){
        $name = $_POST['name'];
        $phone_num = $_POST['phone_num'];
        $problem_message = $_POST['problem_message'];
        $submit_message = '<p class="message">تم تسجيل مشكلتك بنجاح</p>';
    }
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

        <style>
            p.error{
                color: red;

            }
            p.message{
                color:green;
                text-align: center;
            }
        </style>
</head>

<body>

    <?php include "header.html"; ?> <!-- header -->


    <div class="support-form">
        <h2> هل تحتاج إلي المساعدة ؟</h2>
        <form method="post" name="validation">
            <div class="name">
                <input type="text" placeholder="الاسم بالكامل"  name="name" id="name">
                <p id="name_error" style="color: red;"></p>
                <?php echo $name_err ?>
            </div>

            <div class="phone">
                <input type="tel" placeholder="رقم الهاتف (يدعم واتس آب)" required name="phone_num" id="phone_num">
                <?php echo $phone_err ?>
            </div>


            <div class="problem">
                <textarea placeholder="اكتب لنا مشكلتك ..." name="problem_message"></textarea>
                <?php echo $problem_message_err ?>
            </div>

            <div class="submit">
                <button type="submit" name="submit" >إرسال</button>
                <?php echo $submit_message ?>
            </div>
        </form>
    </div>

    
</body>

</html>
