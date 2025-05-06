<?php
session_start();
if(!isset($_SESSION['ID'])){
    header("Location:index.php");
    exit();
}

include("DBconn/conn.php");

$sql = "SELECT * FROM products";
$result = mysqli_query($conn,$sql);


if(isset($_GET['search'])){
    $searchquery = $_GET['search'];
    $sql_search = "SELECT * FROM products WHERE name LIKE '%" . $searchquery . "%'";
    $result = mysqli_query($conn, $sql_search);
}




?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <title>San3a</title>
    <link rel="stylesheet" href="./style/shop.css">
    <link rel="stylesheet" href="./style/footer.css">

    <style>
            a.info{
            padding: 10px;
            color: black;
            border-radius: 10px;
            background-color: #b97f07;
            text-decoration: none;
            margin-top: 100px;
            }
            a.info:hover{
                background-color: #f0b22b;
        }

            .error{
            color: red;
            text-align: center;
            font-size: 20px;
            margin-top: 50px;
        }

    </style>
</head>
<body>

    <?php include "header.php";?> <!-- header -->
    <main>
<form  method="get">
        <div class="search-bar">
            <button class="search-button" type="submit">
                <p class="search-title">
                    إبحث
                </p>
                <img src="Resorces/magnifying-glass.png" class="magnifier">
            </button>
            <input type="text" placeholder="إسم المنتج" class="product-name" name="search">
        </div>

        <div class="products-container">
          <?php
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo '
        <div class="product-container">
            <img src="'.$row['image_url'].'" class="mafak">
            
            <p class="title-card-bold">'.$row['name'].'</p>
            <p class="title-card-light">'.$row['description'].'</p>
            
            <div class="button-card-add">
                <p class="price">'.$row["price"].' LE</p>
                <a class="details-btn" href="product-inside.php?id='.$row['product_id'].'">تفاصيل</a>
            </div>
        </div>';
    }
} else {
    echo "<p class='error'>لا توجد نتائج.</p>";
}
?>

        </div>
    </main>
</form>

    <script>

function navigateToPage(value) {
    if (value) {
        window.location.href = value;
    }
}

    </script>
   
</body>
</html>
<?php
include("footer.php");
?>