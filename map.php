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
    <title>أقرب فني ليك</title>
    <link rel="stylesheet" href="./style/map.css">
</head>

<body>

    <?php include "header.html";?> <!-- header -->

    <div class="map">
        <iframe class="map"
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13815.993162214825!2d31.182491950000003!3d30.0369069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1741138729520!5m2!1sar!2seg"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>


    <div class="now">
        <h3 dir="rtl">هل لديك عطلٌ ولا تستطيع الإنتظار ؟
            إطلب أقرب فنى إليك الآن</h3>
        <div class="box">
            <input type="text" placeholder="الموقع"><br>
            <input type="text" placeholder="التخصص"><br>
            <div>
                <br>
                <textarea name="" id="" placeholder="وصف المشكلة"></textarea><br>
                <button type="submit" class="btn">ابحث</button>
            </div>
        </div>
    </div>





    <script>
        function setActive(element) {
            document.querySelectorAll(".link a").forEach((el) => el.classList.remove("active"));
            element.classList.add("active");
        }


        function navigateToPage(value) {
    if (value) {
        window.location.href = value;
    }
}
    </script>

</body>

</html>