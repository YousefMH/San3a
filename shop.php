<?php
session_start();
if(!isset($_SESSION['ID'])){
    header("Location:index.php");
    exit();
}

include("DBconn/conn.php");

$sql="SELECT * FROM products";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <title>San3a</title>
    <link rel="stylesheet" href="./style/shop.css">
    <style>
            a.info{
            padding: 10px;
            color: black;
            border-radius: 10px;
            background-color: #b97f07;
            text-decoration: none;
            }
    a.info:hover{
        background-color: #f0b22b;
    }
    </style>
</head>
<body>

    <?php include "header.html";?> <!-- header -->

    
    

    <main>
<form  method="post">
        <div class="search-bar">
            <button class="search-button">
                <p class="search-title">
                    إبحث
                </p>
                <img src="Resorces/magnifying-glass.png" class="magnifier">
            </button>
            <input type="text" placeholder="إسم المنتج" class="product-name">
        </div>

        <div class="products-container">
            <?php
                if(mysqli_num_rows($result) > 0){
                    while($row=mysqli_fetch_assoc($result)){
                        echo '<div class="product-container">
                                <img src="Resorces/mfak.jpg" class="mafak">
                                    <p class="title-card-bold">'.$row['name'].'</p>
                                    <p class="title-card-light">'.$row['description'].'</p>
                                    <div class="button-card" name="add_cart">
                                        <button >
                                            <img src="Resorces/star-small.png">
                                        </button>
                                        <p>'.$row["price"].'.LE</p>
                                        <button>
                                            <img src="Resorces/shopping-cart.png">
                                        </button>
                                    </div>
                                    <div><a class="info" href="product-isnide">تفاصيل</a></div>                        
                        </div>';
                    }
                }
            ?>
        </div>
    </main>
</form>



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