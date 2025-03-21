<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="prof.css">
</head>
<body >
    <div class="header">
        <img src="Resorces/Frame 16.png" alt="" class="logo">
        <div class="link">
            <a href="#" target="_blank">الدعم الفني</a>
            <a href="shop.php">قطع الغيار</a>
            <a href="Technical Order.php">التخصصات</a>
            <a href="#">الصفحة الرئيسية </a>
            <button onclick="window.location.href='index.php'">سجل الان</button>
            <a href="map.php">اقرب فني ليك</a>
            <select id="specialty" class="manage" onchange="navigateToPage(this.value)">
                <option>🧑 حسابك</option>
                <option value="prof.php">ادارة الحساب</option>
                <option value="fav.php">المفضلة</option>
                <option value="cart.php">عربة التسوق</option>
            </select>



        </div>
    </div>







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
                <button class="edit">تعديل</button>
                <button class="save">حفظ</button>
            </div>
        </form>
    </div>









</body>
</html>