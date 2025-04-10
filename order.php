<?php
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
    <?php include('header.php'); ?>

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
