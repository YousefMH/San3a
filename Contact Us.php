<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="Contact Us.css">
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
            <a href="homepage.php">الصفحة الرئيسية </a>
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



</body>

</html>