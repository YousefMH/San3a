<?php
    session_start();
    if(!isset($_SESSION['ID'])){
        header("Location:index.php");
        exit();
    }
    include("DBconn/conn.php");

    $product_id=$_GET['id'];


    $sql="SELECT * FROM products WHERE product_id=$product_id";

    $result=mysqli_query($conn,$sql);

    $row=mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/header.css">
    <link rel="stylesheet" href="./style/footer.css">
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/fav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <title>San3a</title>
</head>
<body>

    <?php include "header.php";?> <!-- header -->
    
    <main>
        <div class="product-inside-container">
        <?php
            echo    '<div class="product-inside">
                        <div>
                            <img src="'.$row['image_url'].'" class="mafak-inside">
                        </div>
                        <p class="title-card-bold">'.$row['name'].'</p>
                        <p class="title-card-light">'.$row['description'].'</p>
                        <div class="button-inside">
                            <button class="fav-and-cart-button">
                                <p>
                                    مفضلة
                                </p>
                                <img src="./Resorces/star.png" alt="">
                            </button>
                            <p class="price-text">
                                '.$row['price'].'
                            </p>
                            <button class="fav-and-cart-button">
                                <p>
                                أضف إلى العربة
                                </p>
                                <img src="./Resorces/grocery-store.png">
                            </button>
                        </div>
                        <div class="button-inside-add-container">
                            <div class="button-add">
                                <div>
                                    <button>
                                        +
                                    </button>

                                </div>
                                <div>
                                    <p>
                                        3
                                    </p>

                                </div>
                                <div>
                                    <button>
                                        -
                                    </button>

                                </div>
                            </div>
                            
                        </div>
                        <div class="product-discretion">
                            <p>
                                مزايا المنتج
                            </p>
                            '.$row['properties'].'
                        </div>                
                    </div>';
        ?>
    </main>
    <footer>
        <div class="left-section-footer">
                <img src="./Resorces/google-play.png" class="google-play">
                <img src="./Resorces/pngwing.com (1).png" class="app-store">
            <div class="small-icon-container">
                <img src="./Resorces/facebook.png" class="small-icon">
                <img src="./Resorces/instagram.png" class="small-icon">
                <img src="./Resorces/twitter.png" class="small-icon">
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
                <img src="./Resorces/Frame 16.png" class="san3a-logo">
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
   
</body>
</html>