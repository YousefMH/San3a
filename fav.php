<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
    <link rel="stylesheet" href="style/general.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <title>San3a</title>
    <link rel="stylesheet" href="fav.css">
</head>
<body>

    <!--<img src="Resorces/background.png" class="background">-->
    <div class="header">
        <img src="Resorces/Frame 16.png" alt="" class="logo">
        <div class="link">
            <a href="map.html">اقرب فني ليك</a>
            <button onclick="window.location.href='index.html'">سجل الان</button>
            <a href="#">الصفحة الرئيسية </a>
            <a href="Technical Order.html">التخصصات</a>
            <a href="shop.html">قطع الغيار</a>
            <a href="#" target="_blank">الدعم الفني</a>
            <select id="specialty" class="manage" onchange="navigateToPage(this.value)">
                <option>🧑 حسابك</option>
                <option value="prof.html">ادارة الحساب</option>
                <option value="fav.html">المفضلة</option>
                <option value="cart.html">عربة التسوق</option>
            </select>



        </div>
    </div>
    

    <main>
        <div class="products-container">
            <div class="product-container">
                <img src="Resorces/mfak.jpg" class="mafak">
                <p class="title-card-bold">
                    مفك صليبة كبير
                </p>
                <p class="title-card-light">
                    فولاذ عالى الجودة المقبض مريح 
                </p>
                <p class="title-card-light">
                    20 cm
                </p>
                <div class="button-card">
                    <button>
                        <img src="Resorces/star.png" alt="">
                    </button>
                    <p>
                        200.LE
                    </p>
                    <button>
                        <img src="Resorces/grocery-store.png">
                    </button>
                </div>
            </div>

            <div class="product-container">
                <img src="Resorces/mfak.jpg" class="mafak">
                <p class="title-card-bold">
                    مفك صليبة كبير
                </p>
                <p class="title-card-light">
                    فولاذ عالى الجودة المقبض مريح 
                </p>
                <p class="title-card-light">
                    20 cm
                </p>
                <div class="button-card">
                    <button>
                        <img src="Resorces/star.png" alt="">
                    </button>
                    <p>
                        200.LE
                    </p>
                    <button>
                        <img src="Resorces/grocery-store.png">
                    </button>
                </div>
            </div>

            <div class="product-container">
                <img src="Resorces/mfak.jpg" class="mafak">
                <p class="title-card-bold">
                    مفك صليبة كبير
                </p>
                <p class="title-card-light">
                    فولاذ عالى الجودة المقبض مريح 
                </p>
                <p class="title-card-light">
                    20 cm
                </p>
                <div class="button-card">
                    <button>
                        <img src="Resorces/star.png" alt="">
                    </button>
                    <p>
                        200.LE
                    </p>
                    <button>
                        <img src="Resorces/grocery-store.png">
                    </button>
                </div>
            </div>

            <div class="product-container">
                <img src="Resorces/mfak.jpg" class="mafak">
                <p class="title-card-bold">
                    مفك صليبة كبير
                </p>
                <p class="title-card-light">
                    فولاذ عالى الجودة المقبض مريح 
                </p>
                <p class="title-card-light">
                    20 cm
                </p>
                <div class="button-card">
                    <button>
                        <img src="Resorces/star.png">
                    </button>
                    <p>
                        200.LE
                    </p>
                    <button>
                        <img src="Resorces/grocery-store.png">
                    </button>
                </div>
            </div>
        </div>

    </main>




    <footer>
        <div class="left-section-footer">
                <img src="Resorces/google-play.png" class="google-play">
                <img src="Resorces/pngwing.com (1).png" class="app-store">
            <div class="small-icon-container">
                <img src="Resorces/facebook.png" class="small-icon">
                <img src="Resorces/instagram.png" class="small-icon">
                <img src="Resorces/twitter.png" class="small-icon">
            </div>
            
        </div>

        <div class="mid-section-footer">
            <p class="bold-text-footer">
           هل تحتاج إلى مساعدة ؟ 
            </p>

            <p class="light-text-footer">
                اتصل بنا
            </p>

            <p class="light-text-footer">
                شروط الإستخدام
            </p>

            <p class="light-text-footer">
                الخصوصية
            </p>
        </div>

        <div class="right-section-footer">
            <div class="logo-section">
                <img src="Resorces/Frame 16.png" class="san3a-logo">
                <p class="com">
                    .com
                </p>
            </div>
            <div class="right-text">
                <p class="light-text-footer">
                    من نحن
                </p>

                <p class="light-text-footer">
                    فريق صنعة
                </p>
            </div>
        </div>
    </footer>
   





    <script>

function navigateToPage(value) {
    if (value) {
        window.location.href = value;
    }
}
    </script>
</body>
</html>