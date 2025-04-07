<?php
session_start();
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/order.css">
    <title>طلب فني</title>
    <style>
        h2 {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include('header.html') ?>
    <!-- header -->
    <div class="order">
        <h2>أسم الفني</h2>
        <h2>سعر الزيارة</h2>
        <form id="requestForm" method="post">

            <input type="text" id="serviceType" required placeholder="أدخل طلبك:">

            <input type="date" id="appointmentDate" required placeholder="">

            <input type="text" id="address" placeholder="رابط الموقع أو العنوان :" required>

            <input type="text" id="phone" required placeholder=" أدخل رقم الهاتف : ">

            <button type="submit">إرسال الطلب</button>
            <p id="submit_massgae"></p>
        </form>
    </div>

    <script>
        document.getElementById("requestForm").addEventListener("submit", function(event) {
            event.preventDefault();
            alert("تم إرسال الطلب بنجاح!");
        });
    </script>

</body>

</html>