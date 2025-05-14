<?php
session_start();
if(!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}
include("DBconn/conn.php");

$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM products WHERE product_id=$product_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$default_products = [
    1 => [
        'id' => 1,
        'name' => 'مفك صليبة كبير',
        'description' => 'مفك صليبة كبير بجودة عالية جدًا.',
        'price' => 200,
        'image_url' => 'Resorces/mfak.jpg',
        'properties' => 'جودة عالية جدًا، مصنوع من الفولاذ المقاوم للصدأ، مقبض مريح، مقاوم للصدأ، مناسب للاستخدام الطويل.'
    ],
    2 => [
        'id' => 2,
        'name' => 'مفك صليبة متوسط',
        'description' => 'مفك صليبة متوسط الحجم.',
        'price' => 150,
        'image_url' => 'Resorces/mfak.jpg',
        'properties' => 'مثالي للأعمال الدقيقة، مصنوع من مواد عالية الجودة، مقاوم للتآكل، خفيف الوزن، سهل الاستخدام.'
    ],
    3 => [
        'id' => 3,
        'name' => 'مفك صليبة صغير',
        'description' => 'مفك صليبة صغير للأعمال الدقيقة جدًا.',
        'price' => 100,
        'image_url' => 'Resorces/mfak.jpg',
        'properties' => 'مناسب للأعمال الدقيقة جدًا، خفيف الوزن، سهل الحمل، مقبض مانع للانزلاق، تصميم متين.'
    ],
    4 => [
        'id' => 4,
        'name' => 'مفك عادي كبير',
        'description' => 'مفك عادي كبير الحجم.',
        'price' => 180,
        'image_url' => 'Resorces/mfak.jpg',
        'properties' => 'مثالي للأعمال الثقيلة، مصنوع من الفولاذ القوي، مقبض مريح، مقاوم للصدأ، تصميم قوي ومتين.'
    ]
];

if ($product_id >= 1 && $product_id <= 4) {
    $row = $default_products[$product_id];
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/header.css">
    <link rel="stylesheet" href="./style/footer.css">
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/fav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>San3a</title>
    <style>
        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            min-height: calc(100vh - 200px);
            display: flex;
            justify-content: center;
        }
        .product-inside-container {
            display: flex;
            justify-content: center;
            width: 100%;
        }
        .product-inside {
            background: #2c2c2c;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
            padding: 30px;
            width: 100%;
            max-width: 600px;
            color: #fff;
            transition: transform 0.3s ease;
            text-align: center;
            box-sizing: border-box;
        }
        .product-inside:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        }
        .product-left {
            position: relative;
            margin-bottom: 20px;
            text-align: center;
        }
        .mafak-inside {
            max-width: 100%;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .mafak-inside:hover {
            transform: scale(1.02);
        }
        .fav-heart {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 24px;
            color: #bbb;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(145deg, #444, #333);
            box-shadow: 4px 4px 8px #222, -4px -4px 8px #555;
            border-radius: 50%;
            padding: 10px;
            z-index: 5;
        }
        .fav-heart.active {
            color: #ff5555;
            background: linear-gradient(145deg, #ff3333, #cc0000);
            box-shadow: inset 4px 4px 8px #aa0000, inset -4px -4px 8px #ff6666;
        }
        .favorites-list {
            display: none;
            position: absolute;
            top: 60px;
            right: 0;
            background: #2c2c2c;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.5);
            padding: 15px;
            z-index: 10;
            width: 300px;
            max-height: 300px;
            overflow-y: auto;
            color: #fff;
        }
        .favorites-list.active {
            display: block;
        }
        .favorites-list h4 {
            margin: 0 0 15px;
            font-size: 20px;
            color: #f0b22b;
            text-align: center;
        }
        .favorites-list p {
            margin: 8px 0;
            color: #ccc;
            font-size: 14px;
            padding: 5px 10px;
            background: #333;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .favorites-list p:hover {
            background: #444;
        }
        .favorites-list .empty {
            color: #999;
            font-style: italic;
            text-align: center;
            padding: 10px;
        }
        .title-card-bold {
            font-weight: 700;
            font-size: 24px;
            margin: 15px 0 10px;
            color: #f0b22b;
        }
        .title-card-light {
            font-weight: 400;
            color: #ccc;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .price-box {
            margin-bottom: 20px;
        }
        .price-text {
            font-weight: 600;
            font-size: 22px;
            color: #f0b22b;
        }
        .button-inside-add-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .button-add {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .button-add button {
            width: 50px;
            height: 50px;
            font-size: 20px;
            border: none;
            background: linear-gradient(90deg, #d4a200 0%, #f0b22b 100%);
            color: #fff;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .button-add button:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(240, 178, 43, 0.3);
        }
        .button-add p {
            margin: 0;
            font-size: 20px;
            color: #fff;
            font-weight: 600;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        .fav-and-cart-button {
            display: flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(90deg, #d4a200 0%, #f0b22b 100%);
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .fav-and-cart-button:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(240, 178, 43, 0.3);
        }
        .fav-and-cart-button img {
            width: 20px;
            height: 20px;
        }
        .product-discretion {
            margin-top: 30px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 100%;
            box-sizing: border-box;
        }
        .product-discretion h3 {
            font-weight: 700;
            font-size: 22px;
            color: #f0b22b;
            margin: 0 auto 20px;
            position: relative;
            display: inline-block;
        }
        .product-discretion h3::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: #f0b22b;
            border-radius: 2px;
        }
        .product-discretion p {
            font-weight: 400;
            color: #e0e0e0;
            font-size: 16px;
            line-height: 1.8;
            margin: 0 auto;
            padding: 0;
            width: 100%;
            text-align: center;
            box-sizing: border-box;
            position: relative;
            left: 0;
        }
        .header{
         flex-direction: row-reverse;
        }
        .link{
         flex-direction: row-reverse;

        }
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
    <div class="product-inside-container">
        <?php
        if ($row) {
            $properties = isset($row['properties']) ? explode('،', $row['properties']) : [];
            $properties_text = '';
            foreach ($properties as $index => $property) {
                $property = trim($property);
                if (!empty($property)) {
                    $properties_text .= $property;
                    if ($index < count($properties) - 1) {
                        $properties_text .= ' - ';
                    }
                }
            }

            echo '
            <div class="product-inside">
                <div class="product-left">
                    <img src="' . htmlspecialchars($row['image_url']) . '" class="mafak-inside" alt="' . htmlspecialchars($row['name']) . '">
                    <i class="fas fa-heart fav-heart" onclick="toggleFavorite(' . $product_id . ', this)"></i>
                    <div class="favorites-list" id="favoritesList">
                        <h4>المنتجات المفضلة</h4>
                        <div id="favoritesContent"></div>
                    </div>
                </div>
                <p class="title-card-bold">' . htmlspecialchars($row['name']) . '</p>
                <p class="title-card-light">' . htmlspecialchars($row['description']) . '</p>
                <div class="price-box">
                    <span class="price-text">' . htmlspecialchars($row['price']) . ' LE</span>
                </div>
                <div class="button-inside-add-container">
                    <div class="button-add">
                        <div><button id="increase">+</button></div>
                        <div><p id="counter">0</p></div>
                        <div><button id="decrease">-</button></div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="fav-and-cart-button" onclick="addToCart(' . $product_id . ', ' . $row['price'] . ', \'' . addslashes($row['name']) . '\', \'' . $row['image_url'] . '\')">
                        <img src="./Resorces/grocery-store.png" alt="Add to Cart">
                        <span>أضف إلى العربة</span>
                    </button>
                    <button class="fav-and-cart-button" onclick="toggleFavorite(' . $product_id . ', this)">
                        <img src="./Resorces/star.png" alt="Favorite">
                        <span>مفضلة</span>
                    </button>
                </div>
                <div class="product-discretion">
                    <h3>مزايا المنتج</h3>
                    <p>' . $properties_text . '</p>
                </div>
            </div>';
        } else {
            echo '<p class="error">المنتج غير موجود!</p>';
        }
        ?>
    </div>
</main>

    <script>
        const products = {
            '<?php echo $row['id'] ?? $product_id; ?>': {
                id: <?php echo $row['id'] ?? $product_id; ?>,
                name: '<?php echo addslashes($row['name']); ?>',
                price: <?php echo $row['price']; ?>,
                image: '<?php echo $row['image_url']; ?>'
            }
        };

        const counterElement = document.getElementById("counter");
        const increaseBtn = document.getElementById("increase");
        const decreaseBtn = document.getElementById("decrease");
        let count = parseInt(counterElement.textContent);

        increaseBtn.addEventListener("click", () => {
            count++;
            counterElement.textContent = count;
        });

        decreaseBtn.addEventListener("click", () => {
            if (count > 0) {
                count--;
                counterElement.textContent = count;
            }
        });

        function addToCart(productId, price, name, image) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let quantity = parseInt(document.getElementById('counter').textContent);
            if (quantity > 0) {
                let existingProduct = cart.find(item => item.id === productId);
                if (existingProduct) {
                    existingProduct.quantity += quantity;
                } else {
                    cart.push({ id: productId, name: name, price: price, image: image, quantity: quantity });
                }
                localStorage.setItem('cart', JSON.stringify(cart));
                alert('تم إضافة المنتج إلى العربة!');
                document.getElementById('counter').textContent = '0';
            } else {
                alert('يرجى اختيار كمية أولاً!');
            }
        }

        function toggleFavorite(productId, element) {
            let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
            let heartIcon = element.closest('.product-inside').querySelector('.fav-heart');
            let favoritesList = element.closest('.product-inside').querySelector('.favorites-list');
            let favoritesContent = element.closest('.product-inside').querySelector('#favoritesContent');
            let isFavorite = favorites.includes(productId);

            if (isFavorite) {
                favorites = favorites.filter(id => id !== productId);
                heartIcon.classList.remove('active');
            } else {
                favorites.push(productId);
                heartIcon.classList.add('active');
            }
            localStorage.setItem('favorites', JSON.stringify(favorites));

            favoritesList.classList.toggle('active');
            if (favorites.length === 0) {
                favoritesContent.innerHTML = '<p class="empty">لا توجد منتجات مفضلة!</p>';
            } else {
                favoritesContent.innerHTML = '';
                favorites.forEach(favId => {
                    let product = products[favId];
                    if (product) {
                        favoritesContent.innerHTML += `<p>${product.name} - ${product.price} LE</p>`;
                    }
                });
            }
        }

        window.onload = function() {
            let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
            document.querySelectorAll('.fav-heart').forEach(heart => {
                let productId = heart.getAttribute('onclick').match(/\d+/)[0];
                if (favorites.includes(parseInt(productId))) {
                    heart.classList.add('active');
                }
            });
        };
    </script>
    <?php include "footer.php";?>
</body>
</html>
<?php
mysqli_close($conn);
?>