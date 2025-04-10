<?php
    session_start();
    if(!isset($_SESSION['ID'])){
        header("Location:index.php");
        exit();
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
    <link rel="stylesheet" href="style/general.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <title>San3a</title>
    <link rel="stylesheet" href="./style/cart.css">
</head>
<body>

    <?php include "header.html";?> <!-- header -->
    

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
        
        <div class="cart-bottom-container">
            <div class="images-text-container">
                <p class="payment">
                    وسائل الدفع
                </p>
                <div class="images-container">
                    <div class="part1">
                        <img src="Resorces/mastercard.png" class="payment-imeges">
                        <img src="Resorces/vodafone.png" class="payment-imeges">
                        <img src="Resorces/fawry.png" class="payment-imeges">

                    </div>
                    <div class="part2">
                    <img src="Resorces/etesalat.png" class="payment-imeges">
                    <img src="Resorces/visa.jpeg" class="payment-imeges">
                    </div>
                </div>
            </div>

            <div class="total-container">
                <p class="total-text">
                    الإجمالى
                </p>
                <p class="total-price">
                    800.LE
                </p>
            </div>

            
            
        </div>

        
        

    </main>




    <!-- <footer>
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
    </footer> -->





    <script>

function navigateToPage(value) {
    if (value) {
        window.location.href = value;
    }
}
    </script>
   
</body>
</html>