<?php
session_start();
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}

include "DBconn/conn.php";

// التحقق من وجود technician_id في الرابط
if (!isset($_GET['technician_id'])) {
    die("معرّف الفني غير موجود");
}

$technician_id = (int)$_GET['technician_id'];

// تنفيذ استعلام SQL للحصول على بيانات الفني
$sql = "SELECT users.first_name, users.last_name, technicians.visit_price 
        FROM technicians 
        JOIN users ON users.user_id = technicians.user_id 
        WHERE technicians.user_id = $technician_id 
        LIMIT 1";

$result = mysqli_query($conn, $sql);

// التحقق من وجود نتيجة
if (mysqli_num_rows($result) > 0) {
    $technician = mysqli_fetch_assoc($result);
} else {
    die("الفني غير موجود");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['ID'];
    $service_type = $_POST['serviceType'];
    $appointment_date = $_POST['appointmentDate'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Server-side validation
    if (empty($service_type) || empty($appointment_date) || empty($address) || empty($phone)) {
        $error = "يرجى ملء جميع الحقول.";
    } else {
        $stmt = $conn->prepare("INSERT INTO orders (user_id, technician_id, service_type, appointment_date, address, phone, status) 
                                VALUES (?, ?, ?, ?, ?, ?, 'pending')");
        $stmt->bind_param("iissss", $user_id, $technician_id, $service_type, $appointment_date, $address, $phone);

        if ($stmt->execute()) {
            $success = "تم إرسال الطلب بنجاح!";
        } else {
            $error = "حدث خطأ أثناء إرسال الطلب.";
        }

        $stmt->close();
    }
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
        <h2>أسم الفني: <?= htmlspecialchars($technician['first_name'] . ' ' . $technician['last_name']) ?></h2>
        <h2>سعر الزيارة: <?= htmlspecialchars($technician['visit_price']) ?> جنيه</h2>

        <form method="post">
            <input type="text" name="serviceType" required placeholder="أدخل طلبك:">
            <input type="date" name="appointmentDate" required>
            <input type="text" name="address" required placeholder="رابط الموقع أو العنوان :">
            <input type="text" name="phone" required placeholder=" أدخل رقم الهاتف : ">
            <button type="submit">إرسال الطلب</button>
        </form>

        <?php if (isset($success)): ?>
            <p class="msg"><?= $success ?></p>
        <?php elseif (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
    </div>
</body>

</html>
