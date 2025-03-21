<?php
session_start();
if(!isset($_SESSION['ID'])){
    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="w.phpth=, initial-scale=1.0">
    <title>صنعة - خدمات منزلية</title>
    <link rel="stylesheet" href="homepage style/header.css">
    <link rel="stylesheet" href="homepage style/home general.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">


</head>

<body>
    <img src="Resorces/carpenter-steven-remple.jpg.webp" class="background">
    <header>
        <div class="container">
            <div class="logo">
                <span class="com-txt"> com.</span>
                <a href="homepage.php">
                    <img src="Resorces/Frame 16.png" alt="شعار صنعة">
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="homepage.php"> الصفحة الرئيسية</a></li>
                    <li><a href="Technical Order.php">التخصصات</a></li>
                    <li><a href="shop.php">قطع الغيار</a></li>
                </ul>
            </nav>
        </div>
    </header>





    <div class="general">
        <div class="overlay">
            <div class="content">
                <?php
                 if(isset($_SESSION['fname'])){
                    echo '<h1> اهلا ' . $_SESSION['fname'] . ' مرحبا بك في صنعة</h1>';
                }
                ?>
                <p>
                    تقدم صنعة خدمات منزلية عالية الجودة، بما في ذلك التنظيف، السباكة، إصلاحات الكهرباء والمزيد.<br> يضمن محترفونا المهرة حلولًا سريعة وموثوقة وبأسعار معقولة لتلبية احتياجات منزلك.<br> إحجز خدمتك اليوم لتجربة خالية من المتاعب.
                </p>
                <button class="cta">إنضم إلينا</button>
            </div>
        </div>
    </div>


</body>

</html>