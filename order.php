<?php
    $technician_id=$_GET['id'];
    session_start();
    if (!isset($_SESSION['ID'])) {
        header("Location:index.php");
        exit();
    }
    include("DBconn/conn.php");

    $sql="SELECT users.first_name,users.last_name,technicians.visit_price 
    FROM technicians 
    JOIN users ON users.user_id = technicians.user_id
    WHERE technicians.user_id=$technician_id";

    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);


    if(isset($_POST['serviceType']) && isset($_POST['appointmentDate']) && isset($_POST['address']) && isset($_POST['phone'])){
        $serviceType = $_POST['serviceType'];
        $appointmentDate = $_POST['appointmentDate'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $visitPrice = $row['visit_price'];
        $UID = $_SESSION['ID'];

        $InsertOrderQuiery = "INSERT INTO tech_orders(order_title,order_date,order_location,order_price,user_id,tech_id,user_phone) 
                              VALUES('$serviceType','$appointmentDate','$address','$visitPrice','$UID','$technician_id','$phone')";

    if(mysqli_query($conn,$InsertOrderQuiery)){
    echo '<div style="padding: 20px; border: 2px solid #f44336; border-radius: 5px; background-color:rgb(72, 153, 52); color: #721c24; font-family: Arial, sans-serif; direction: rtl; text-align: right;">
    <strong>تم بنجاح</strong> تم إنشاء طلبك بنجاح
    </div>';
}else{
    echo "DB Error";
}
    }
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/order.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="./style/general.css">

    <title>طلب فني</title>
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
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

<?php
include("footer.php");
?>
