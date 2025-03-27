<?php
session_start();
if(!isset($_SESSION['ID'])){
    header("Location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/Home.css">
</head>
<body>
    <div class="header">
        <img src="Resorces/Frame 16.png" alt="" class="logo">
        <div class="link">
            <a href="map.php">اقرب فني ليك</a>
            <button onclick="window.location.href='index.php'">سجل الان</button>
            <a href="Home.php">الصفحة الرئيسية </a>
            <a href="Technical Order.php">التخصصات</a>
            <a href="shop.php">قطع الغيار</a>
            <a href="Contact Us.php">الدعم الفني</a>
            <select id="specialty" class="manage" onchange="navigateToPage(this.value)">
                <option>🧑 حسابك</option>
                <option value="prof.php">ادارة الحساب</option>
                <option value="fav.php">المفضلة</option>
                <option value="cart.php">عربة التسوق</option>
            </select>
        </div>
    </div>
    <div dir="rtl" class="now">
    <h1>                 
        <?php
            if(isset($_SESSION['fname'])){
                echo '<h1> اهلا ' . $_SESSION['fname'] . ' مرحبا بك في صنعة</h1>';
            }
        ?>
    </h1>
     <p>تقدم صنعه خدمات منزلية عالية الجودة، بما في ذلك التنظيف، السباكة ، اصلاحات الكهرباوالمزيد. <br>
        يضمن محترفونا المهارة و الحلول السريعه وموثوقة و بأسعار معقولة لتلبية احتياجاتكم. <br>
        احجز خدمتك اليوم لتجربة خالية من المتاعب. 
    </p>
    <button class="btn" onclick="window.location.href='all Technicals.php'">أطلب فني</button>
    </div>
    <script>
function navigateToPage(value) {
    if (value) {
        window.location.href = value;
    }
}
    </script>
</body>
</html>