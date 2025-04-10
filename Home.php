<?php
session_start();
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style/Home.css">
</head>

<body>

    <?php include "header.html"; ?>
    <!-- header -->
    
    <div dir="rtl" class="now" style="cursor:auto;">
        <h1>
            <?php
            if (isset(($_SESSION['fname']))) {
                echo '<h1> اهلا ' . ucfirst($_SESSION['fname']) . ' مرحبا بك في صنعة</h1>';
            }
            ?>
        </h1>
        <p>تقدم صنعه خدمات منزلية عالية الجودة، بما في ذلك التنظيف، السباكة ، اصلاحات الكهرباوالمزيد. <br>
            يضمن محترفونا المهارة و الحلول السريعه وموثوقة و بأسعار معقولة لتلبية احتياجاتكم. <br>
            احجز خدمتك اليوم لتجربة خالية من المتاعب.
        </p>
        <button class="btn" onclick="window.location.href='Technicians.php'">أطلب فني</button>
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