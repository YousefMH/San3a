<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="Control.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div class="header">
        <img src="Resorces/Frame 16.png" alt="" class="logo">
        <div class="link">
            <a href="map.php">اقرب فني ليك</a>
            <button onclick="window.location.href='index.php'">سجل الان</button>
            <a href="#">الصفحة الرئيسية </a>
            <a href="Technical Order.php">التخصصات</a>
            <a href="shop.php">قطع الغيار</a>
            <a href="#" target="_blank">الدعم الفني</a>
            <select id="specialty" class="manage" onchange="navigateToPage(this.value)">
                <option>🧑 حسابك</option>
                <option value="prof.php">ادارة الحساب</option>
                <option value="fav.php">المفضلة</option>
                <option value="cart.php">عربة التسوق</option>
            </select>



        </div>
    </div>

    <div class="dashboard">
        <h2>لوحة التحكم</h2><br><br>
        <div class="buttons">
            <button class="button">الإشعارات</button>
            <button class="button ">المواعيد المتاحة</button>
            <button class="button active">الطلبات</button>
        </div>
        <div class="requests">
            <h3>طلبات جديدة</h3><br>
            <div class="request-item">صيانة تكييف - 10 صباحًا</div>
            <div class="request-item">تصليح غسالة - 2 مساءً</div>
            <div class="request-item">فحص كهرباء - 5 مساءً</div>
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












    <script src="control.js"></script>
</body>

</html>