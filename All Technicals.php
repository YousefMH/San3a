<?php
    include "DBconn/conn.php";

    if(isset($_POST['BtnSearch'])){ 
    
        $specialtySelect = isset($_POST['specialty']) ? $_POST['specialty'] : "%";
        $provinceSelect  = isset($_POST['province']) ? $_POST['province'] : "%";
        $areaSelect      = isset($_POST['area']) ? $_POST['area'] : "%";
        $SearchQuery = "SELECT users.first_name,users.last_name,users.user_id,technicians.specialty,technicians.province,technicians.area,technicians.visit_price,technicians.work_hours
                        FROM technicians 
                        JOIN users ON users.user_id = technicians.user_id
                        WHERE technicians.specialty LIKE '$specialtySelect'
                        AND technicians.province LIKE '$provinceSelect' 
                        AND technicians.area LIKE '$areaSelect'";
        $result = mysqli_query($conn,$SearchQuery);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>كل التخصصات</title>
    <link rel="stylesheet" href="./style/All Technicals.css">
</head>
<body>

<div class="header">
        <img src="Resorces/Frame 16.png" alt="" class="logo">
        <div class="link">
            <a href="map.php">اقرب فني ليك</a>
            <button onclick="window.location.href='index.php'">سجل الان</button>
            <a href="homepage.php">الصفحة الرئيسية </a>
            <a href="Technical Order.php">التخصصات</a>
            <a href="shop.php">قطع الغيار</a>
            <a href="Contact Us.php" target="_blank">الدعم الفني</a>
            <select id="specialty" class="manage" onchange="navigateToPage(this.value)">
                <option>🧑 حسابك</option>
                <option value="prof.php">ادارة الحساب</option>
                <option value="fav.php">المفضلة</option>
                <option value="cart.php">عربة التسوق</option>
            </select>
        </div>
    </div>

    <form method="POST">
        <div class="search-section">
            <h2>اطلب فني</h2>
            <div class="filters">
                <button onclick="searchTechnicians()" name="BtnSearch" type="submit">بحث</button>
                <select id="specialty" name="specialty">
                <option value=" " disabled selected>اختر التخصص</option>
                <option value="كهربائي">كهربائي</option>
                <option value="نجار">نجار</option>
                <option value="سباك">سباك</option>
                <option value="حداد">حداد</option>
                <option value="نقاش">نقاش</option>
            </select>
                <select id="province" name="province">
                <option disabled selected>اختيار المحافظة</option>
                <option value="القاهرة">القاهرة</option>
                <option value="الإسكندرية">الإسكندرية</option>
            </select>
                <select id="area" name="area">
                <option disabled selected>اختيار المنطقة</option>
                <option value="فيصل">فيصل</option>
                <option value="6 أكتوبر" >6 أكتوبر</option>
            </select>
            </div>
        </div>
    </form>

    <div class="technicians">
        <h2>أفضل ما لدينا</h2>
      
        <div class="categories">
            <a href="#"><button>كل التخصصات</button></a>

        </div>

        <div id="technicians-list" class="cards">
            
        <?php

            if(isset($result)){
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card">
                        <div class="right">
                            <a href=" "><img src="Resorces/man.png " alt="فني "></a>
                            <div class="rating ">⭐⭐⭐⭐⭐</div>
                        </div>

                        <div class="left ">
                            <h3>'. $row["first_name"] . ' ' . $row["last_name"] . '</h3>
                            <p>' . $row["specialty"] . '</p>
                            <p>' . $row["area"] . '</p>
                            <p>' . $row["visit_price"] . '</p>
                            <p>' . $row["work_hours"] . 'ساعات العمل</p>
                        </div>
                    </div>';
                }
            }
        ?>
            <br><br>
        </div>
        <br> 
    </div>
</body>
</html>