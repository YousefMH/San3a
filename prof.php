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
    <link rel="stylesheet" href="./style/prof.css">
</head>
<body >
    
    <?php include "header.html";?> <!-- header -->

    <div class="form-container">
        <div class="profile-section">
            <div class="profile-picture"></div>
            <label for="upload" class="upload-icon">📷</label>
            <input type="file" id="upload" hidden>
        </div>

        <form >
            <div class="name-fields">
                <input type="text" placeholder="الاسم الثاني">
                <input type="text" placeholder="الاسم الأول">
            </div>
            <input type="email" placeholder="البريد الإلكتروني">
            <input type="text" placeholder="الرقم القومي">
            <input type="tel" placeholder="رقم الهاتف">
            <input type="text" placeholder="المهنة">

            <div class="buttons">
                <button class="save">حفظ</button>
            </div>
        </form>
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