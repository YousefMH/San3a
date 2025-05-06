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
        echo '
        <div class="product-inside">
            <div class="product-left">
                <img src="'.$row['image_url'].'" class="mafak-inside" alt="Product Image">
            </div>
                        <p class="title-card-bold">'.$row['name'].'</p>
                <p class="title-card-light">'.$row['description'].'</p>
                
                <div class="price-box">
                    <span class="price-text">السعر: '.$row['price'].' LE</span>
                </div>

                <div class="button-inside-add-container">
                    <div class="button-add">
                        <div><button id="increase">+</button></div>
                        <div><p id="counter">0</p></div>
                        <div><button id="decrease">-</button></div>
                    </div>
                </div>

                <div class="action-buttons">
                    <button class="fav-and-cart-button">
                        <img src="./Resorces/grocery-store.png" alt="">
                        <span>أضف إلى العربة</span>
                    </button>
                    <button class="fav-and-cart-button">
                        <img src="./Resorces/star.png" alt="">
                        <span>مفضلة</span>
                    </button>
                </div>

                <div class="product-discretion">
                    <h3>مزايا المنتج</h3>
                    <p>'.$row['properties'].'</p>
                </div>
            </div>
        </div>';
        ?>
    </div>
</main>

    
   
    <script>
    // نجيب العناصر
    const counterElement = document.getElementById("counter");
    const increaseBtn = document.getElementById("increase");
    const decreaseBtn = document.getElementById("decrease");

    // نجيب الرقم و نحوله لرقم حقيقي
    let count = parseInt(counterElement.textContent);

    // حدث الضغط على زرار +
    increaseBtn.addEventListener("click", () => {
        count++;
        counterElement.textContent = count;
    });

    // حدث الضغط على زرار -
    decreaseBtn.addEventListener("click", () => {
        if (count > 0) {
            count--;
            counterElement.textContent = count;
        }
    });
</script>

</body>
</html>
<?php
include("footer.php");
?>
