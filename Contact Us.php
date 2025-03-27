<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="./style/Contact Us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <?php include "header.html";?> <!-- header -->


    <div class="support-form">
        <h2> هل تحتاج إلي المساعدة ؟</h2>
        <form>
            <div class="name">
                <input type="text" placeholder="الاسم بالكامل" required>
            </div>

            <div class="phone">
                <input type="tel" placeholder="رقم الهاتف (يدعم واتس آب)" required>
            </div>


            <div class="problem">
                <textarea placeholder="اكتب لنا مشكلتك ..."></textarea>
            </div>

            <div class="submit">
                <button type="submit">إرسال</button>
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