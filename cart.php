<?php
session_start();
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="../style/home.css">
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/footer.css">
    <link rel="stylesheet" href="./style/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <title>San3a</title>
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background-color: #FBAE3C;
            border-radius: 0 0 20px 20px;
            height: 50px;
            position: relative;
            z-index: 10;
        }

        .logo {
            width: 99px;
            padding: 0px 40px;
        }

        .link {
            display: flex;
            gap: 30px;
            font-size: 17px;
        }

        .link a {
            text-decoration: none;
            padding: 4px 20px;
            color: #fff;
        }

        .link a:hover {
            color: #000000;
            background-color: #f0b22b;
            border-radius: 35px;
        }

        .link button {
            background-color: #f0b22b;
            border: none;
            padding: 5px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 20px;
            font-family: "Tajawal", sans-serif;
        }

        .manage {
            font-family: "Tajawal", sans-serif;
            background: none;
            border: none;
            color: white;
        }

        option {
            background-color: rgb(212, 138, 0);
            text-align: center;
            border-radius: 30px;
        }
    </style>
</head>

<body>
    <?php include("header.php") ?>
    <main>
        <div class="cart-header">
            <h2>عربة التسوق</h2>
        </div>
        <div class="products-container" id="productsContainer"></div>
        <div class="cart-bottom-container">
            <div class="images-text-container">
                <p class="payment">وسائل الدفع</p>
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
                <p class="total-text">الإجمالى</p>
                <p class="total-price" id="totalPrice">0 LE</p>
                <button class="checkout-btn" onclick="checkout()">إتمام الشراء</button>
            </div>
        </div>
    </main>
    <script>
        function navigateToPage(value) {
            if (value) {
                window.location.href = value;
            }
        }

        // تحديث العربة
        function updateCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let productsContainer = document.getElementById('productsContainer');
            let totalPriceElement = document.getElementById('totalPrice');
            let total = 0;

            productsContainer.innerHTML = '';
            if (cart.length === 0) {
                productsContainer.innerHTML = '<p class="empty-cart">العربة فارغة!</p>';
                totalPriceElement.textContent = '0 LE';
            } else {
                cart.forEach((product, index) => {
                    let productDiv = document.createElement('div');
                    productDiv.className = 'product-container';
                    productDiv.innerHTML = `
                        <div class="product-image">
                            <img src="${product.image}" class="mafak">
                        </div>
                        <div class="product-details">
                            <p class="title-card-bold">${product.name}</p>
                            <p class="title-card-light">فولاذ عالى الجودة المقبض مريح</p>
                            <p class="price-title">${product.price} LE</p>
                            <div class="quantity-controls">
                                <button onclick="updateQuantity(${index}, -1)">-</button>
                                <span>${product.quantity}</span>
                                <button onclick="updateQuantity(${index}, 1)">+</button>
                            </div>
                            <button class="remove-btn" onclick="removeFromCart(${index})">حذف</button>
                        </div>
                    `;
                    productsContainer.appendChild(productDiv);
                    total += product.price * product.quantity;
                });
                totalPriceElement.textContent = `${total} LE`;
            }
        }

        function updateQuantity(index, change) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart[index].quantity += change;
            if (cart[index].quantity <= 0) {
                cart.splice(index, 1);
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
        }

        function checkout() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (cart.length === 0) {
                alert('العربة فارغة! أضف منتجات أولاً.');
            } else {
                alert('تم إتمام البيع، فاضل التأكيد');
                localStorage.removeItem('cart');
                updateCart();
            }
        }

        window.onload = function() {
            updateCart();
        };
    </script>
    <?php include "footer.php"; ?>
</body>

</html>