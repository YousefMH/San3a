<?php
    session_start();
    include "DBconn/conn.php";
    if(!isset($_SESSION['ID'])){
        header("Location:index.php");
        exit();
    }
    
    if($_SESSION['role'] == "client"){
        header("Location:Home.php");
        exit();
    }
    $currentID = $_SESSION['ID'];
    $SelectOrdersQuery = "SELECT 	
                            tech_orders.order_title,
                            tech_orders.order_date,
                            tech_orders.order_location,
                            tech_orders.order_price,
                            tech_orders.user_phone
                        FROM tech_orders
                        JOIN technicians ON technicians.user_id = tech_orders.tech_id
                        WHERE tech_orders.tech_id = $currentID";

    $result=mysqli_query($conn,$SelectOrdersQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="./style/Control.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <?php include "header.html";?> <!-- header -->

    <div class="dashboard">
        <div class="buttons">
            <button class="button active">الطلبات الجديدة</button>
        </div>
        <div class="requests">
            <?php
            if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="request-item"> 
                        <strong>' . $row['order_title'] . ' </strong>'.
                        ' <br><br> موعد الطلب: ' . $row['order_date'] . 
                        ' <br> مكان الطلب: ' . $row['order_location'] . 
                        ' <br> سعر الطلب: ' . $row['order_price'] .
                        ' <br> رقم التواصل الخاص بالعميل: ' . $row['user_phone'] .
                        '</div>';
                    }
                }
                else{
                    echo "<p class='error' style='color:red'>لا توجد طلبات في الوقت الحالي.</p>";
                }
                ?>
        </div>
    </div>

    <div class="chat-icon" id="chatIcon">
        <i class="fa-solid fa-comments fa-sm" style="color: #000000;"></i>
    </div>
    
    <!-- قائمة الدردشات -->
    <div class="chat-box" id="chatBox">
        <div class="chat-header">
            <span>المحادثات</span>
            <button id="closeChat">×</button>
        </div>
        <div class="chat-list" id="chatList">
            <div class="chat-item" data-user="أحمد علي"> <strong>أحمد علي</strong>: مرحبًا، هل يمكنك الصيانة اليوم؟ </div>
            <div class="chat-item" data-user="محمد علي"> <strong>محمد علي</strong>: متى تكون متاحًا للصيانة؟ </div>
            <div class="chat-item" data-user="خالد حسن"> <strong>خالد حسن</strong>: هل لديك وقت يوم الخميس؟ </div>
        </div>
    </div>
    
    <!-- شاشة المحادثة مع المستخدم -->
    <div class="chat-window" id="chatWindow">
        <div class="chat-header">
            <button id="backToList">←</button>
            <span id="chatUserName"></span>
        </div>
        <div class="chat-body" id="chatBody">
            <!-- الرسائل تظهر هنا -->
        </div>
        <div class="chat-footer">
            <input type="text" id="messageInput" placeholder="اكتب رسالتك...">
            <button id="sendMessage">إرسال</button>
        </div>
    </div>
    <script src="./js/control.js"></script>
</body>

</html>