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
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
    <title>Home</title>
    <link rel="stylesheet" href="./style/Home.css">
    <link rel="stylesheet" href="./style/footer-home.css">
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        footer {
            position: absolute;
            bottom: 0;
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>
    <!-- header -->
    <div class="welcome-section">
        <div dir="rtl" class="now" style="cursor:auto;">
            <h1>
                <?php
                if (isset($_SESSION['fname'])) {
                    echo '<h1> أهلا ' . ucfirst($_SESSION['fname']) . ' مرحبا بك في صنعة</h1>';
                }
                ?>
            </h1>
            <p>تقدم صنعة خدمات منزلية عالية الجودة، بما في ذلك التنظيف، السباكة، إصلاحات الكهرباء والمزيد. <br>
                يضمن محترفونا المهارة والحلول السريعة وموثوقة وبأسعار معقولة لتلبية احتياجاتكم. <br>
                احجز خدمتك اليوم لتجربة خالية من المتاعب.
            </p>
            <button class="btn" onclick="window.location.href='Technicians.php'">أطلب فني</button>
        </div>
        <div dir="rtl" class="video-container">
            <h3> فيديو تعريفي عن صنعة</h3>
            <video controls poster="https://via.placeholder.com/600x300?text=صنعة+فيديو" aria-label="فيديو تعريفي عن صنعة">
                <source src="Resorces/san3a.mp4" type="video/mp4" />
                <track kind="captions" src="captions.vtt" srclang="ar" label="العربية" />
                المتصفح الخاص بك لا يدعم تشغيل الفيديو. يرجى التواصل معنا لمزيد من المعلومات.
            </video>
        </div>
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
<?php
include("footer.php");
?>