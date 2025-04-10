<?php
// session_start();
// if (!isset($_SESSION['ID'])) {
//     header("Location:index.php");
//     exit();
// }

// include "DBconn/conn.php";

// // // التحقق من وجود technician_id في الرابط
// if (!isset($_GET['technician_id'])) {
//     die("معرّف الفني غير موجود");
// }

// $technician_id = $_GET['technician_id'];
// $currentID = $_SESSION['ID'];

// // تنفيذ استعلام SQL للحصول على بيانات الفني
// $sql = "SELECT users.first_name, users.last_name, technicians.visit_price 
//         FROM technicians 
//         JOIN users ON users.user_id = technicians.user_id 
//         WHERE technicians.user_id = $technician_id 
//         LIMIT 1";

// $result = mysqli_query($conn, $sql);

// // التحقق من وجود نتيجة
// if (mysqli_num_rows($result) > 0) {
//     $technician = mysqli_fetch_assoc($result);
// } else {
//     die("الفني غير موجود");
// }

// // Handle form submission
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $service_type = $_POST['serviceType'];
//     $appointment_date = $_POST['appointmentDate'];
//     $address = $_POST['address'];
//     $phone = $_POST['phone'];

//     // Server-side validation
//     if (empty($service_type) || empty($appointment_date) || empty($address) || empty($phone)) {
//         $error = "يرجى ملء جميع الحقول.";
//     } else {
//         $CreteOrderQuiery = "INSERT INTO tech_orders (user_id, tech_id, order_title, address, user_phone) 
//                             VALUES ($currentID, $technician_id, '$service_type', '$address', '$phone')";
//         if (mysqli_query($conn, $CreteOrderQuiery)) {
//             $success = "تم إرسال الطلب بنجاح!";
//         } else {
//             $error = "حدث خطأ أثناء إرسال الطلب: " . mysqli_error($conn);
//         }
//     }
// }

    $technician_id=$_GET['id'];

    include("DBconn/conn.php");

    $sql="SELECT users.first_name,users.last_name,technicians.visit_price 
    FROM technicians 
    JOIN users ON users.user_id = technicians.user_id
    WHERE technicians.user_id=$technician_id";

    $result=mysqli_query($conn,$sql);

    $row=mysqli_fetch_assoc($result);

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

        .msg {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include('header.html'); ?>

    <div class="order">
        <h2><?php echo $row['first_name'].' '.$row['last_name'] ?></h2>
        <h2><?php echo $row['visit_price'].' '.'EGP'?></h2>

        <form method="post">
            <input type="text" name="serviceType" required placeholder="أدخل طلبك:">
            <input type="date" name="appointmentDate" required>
            <input type="text" name="address" required placeholder="رابط الموقع أو العنوان :">
            <input type="text" name="phone" required placeholder=" أدخل رقم الهاتف : ">
            <button type="submit">إرسال الطلب</button>
        </form>
    </div>
</body>

</html>
