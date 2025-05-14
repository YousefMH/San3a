<?php
session_start();
if(!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}

include("DBconn/conn.php");

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if(isset($_GET['search'])) {
    $searchquery = mysqli_real_escape_string($conn, $_GET['search']);
    $sql_search = "SELECT * FROM products WHERE name LIKE '%" . $searchquery . "%'";
    $result = mysqli_query($conn, $sql_search);
}

$default_products = [
    ['id' => 1, 'name' => 'مفك صليبة كبير', 'description' => 'مفك صليبة كبير بجودة عالية جدًا، مصنوع من الفولاذ المقاوم للصدأ مع مقبض مريح للاستخدام الطويل.', 'price' => 200, 'image_url' => 'Resorces/mfak.jpg'],
    ['id' => 2, 'name' => 'مفك صليبة متوسط', 'description' => 'مفك صليبة متوسط الحجم، مثالي للأعمال الدقيقة، مصنوع من مواد عالية الجودة مع مقاومة للتآكل.', 'price' => 150, 'image_url' => 'Resorces/mfak.jpg'],
    ['id' => 3, 'name' => 'مفك صليبة صغير', 'description' => 'مفك صليبة صغير للأعمال الدقيقة جدًا، خفيف الوزن وسهل الحمل، بمقبض مانع للانزلاق.', 'price' => 100, 'image_url' => 'Resorces/mfak.jpg'],
    ['id' => 4, 'name' => 'مفك عادي كبير', 'description' => 'مفك عادي كبير الحجم، مثالي للأعمال الثقيلة، مصنوع من الفولاذ القوي مع مقبض مريح.', 'price' => 180, 'image_url' => 'Resorces/mfak.jpg']
];
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/footer-home.css">
    <link rel="stylesheet" href="./style/shop.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <title>San3a</title>
    <style>
        footer
        {
            flex-direction: row-reverse;
        }
        .left-section-footer{
            position: relative;
            align-items: end;
        }
    </style>
</head>
<body>
    <?php include "header.php";?>
    <main>
        <form method="get" action="">
            <div class="search-bar">
                <button class="search-button" type="submit">
                    <p class="search-title">ابحث</p>
                    <img src="Resorces/magnifying-glass.png" class="magnifier" alt="Search Icon">
                </button>
                <input type="text" placeholder="اسم المنتج" class="product-name" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            </div>
        </form>
        <div class="products-container">
            <?php
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="product-container">
                        <img src="' . htmlspecialchars($row['image_url']) . '" class="mafak" alt="' . htmlspecialchars($row['name']) . '">
                        <p class="title-card-bold">' . htmlspecialchars($row['name']) . '</p>
                        <p class="title-card-light">' . htmlspecialchars(substr($row['description'], 0, 50)) . '...</p>
                        <p class="price">' . htmlspecialchars($row['price']) . ' LE</p>
                        <div class="button-card-add">
                            <a class="details-btn" href="Product-inside.php?id=' . htmlspecialchars($row['product_id']) . '">تفاصيل</a>
                        </div>
                    </div>';
                }
            }

            // عرض المنتجات الافتراضية (الـ 4 مفكات)
            foreach ($default_products as $default_product) {
                echo '
                <div class="product-container">
                    <img src="' . htmlspecialchars($default_product['image_url']) . '" class="mafak" alt="' . htmlspecialchars($default_product['name']) . '">
                    <p class="title-card-bold">' . htmlspecialchars($default_product['name']) . '</p>
                    <p class="title-card-light">' . htmlspecialchars(substr($default_product['description'], 0, 50)) . '...</p>
                    <p class="price">' . htmlspecialchars($default_product['price']) . ' LE</p>
                    <div class="button-card-add">
                        <a class="details-btn" href="Product-inside.php?id=' . htmlspecialchars($default_product['id']) . '">تفاصيل</a>
                    </div>
                </div>';
            }
            ?>
        </div>
    </main>
    <script>
        function navigateToPage(value) {
            if (value) {
                window.location.href = value;
            }
        }

        window.onload = function() {
            if (localStorage.getItem('cart')) {
                console.log('Cart loaded:', JSON.parse(localStorage.getItem('cart')));
            }
        };
    </script>
    <?php include "footer.php";?>
</body>
</html>
<?php
mysqli_close($conn);
?>