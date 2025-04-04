<?php

    // THIS PAGE IS CANCELED AND USED TECHNICIAN.php INSTEAD OF THIS 

    session_start();
    if(!isset($_SESSION['ID'])){
        header("Location:index.php");
        exit();
    }
    include "DBconn/conn.php";
    $result = "";
    if (isset($_POST['BtnSearch'])){
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
    <title>إطلب فني</title>
    <link rel="stylesheet" href="./style/Technical Order.css">
    <style>
    a.order{
            padding: 10px;
            color: black;
            border-radius: 10px;
            background-color: #b97f07;
            text-decoration: none;
    }
    a.order:hover{
        background-color: #f0b22b;
    }
    </style>
</head>

<body>

    <?php include "header.html"; ?> <!-- header -->


        <div class="search-section">
        <h2>اطلب فني</h2>
        <div class="filters">
            <select id="specialty">
                <option value="" disabled selected>اختر التخصص</option>
                <option value="نجار">نجار</option>
                <option value="سباك">سباك</option>
                <option value="حداد">حداد</option>
                <option value="نقاش">نقاش</option>
            </select>
            <select id="province">
                <option disabled selected>اختيار المحافظة</option>
                <option value="القاهرة">القاهرة</option>
                <option value="الإسكندرية">الإسكندرية</option>
            </select>
            <select id="area">
                <option disabled selected>اختيار المنطقة</option>
                <option value="فيصل">فيصل</option>
                <option value="6 أكتوبر">6 أكتوبر</option>
            </select>
            <button type="button" onclick="searchTechnicians()">بحث</button>
        </div>
    </div>
    <div class="technicians">
        <h2>أفضل ما لدينا</h2>

        <div class="categories">
            <a href="All Technicals.php"><button>كل التخصصات</button></a>
            <a href="#"><button>نجار</button></a>
            <a href="#"><button>سباك</button></a>
            <a href="#"><button>حداد</button></a>
            <a href="#"><button>تكييف</button></a>
        </div>

        <div id="technicians-list" class="cards">
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card">
                            <div class="right">
                                <h3>' . $row['first_name'] . ' ' . $row['last_name']. '</h3>
                                <p>' .$row['specialty']. '</p>
                                <p>' .$row['area']. '</p>
                            </div>
                            <div class="left">
                                <a href="#"><img src="Resorces/man.png" alt="فني"></a>
                                <div class="rating">⭐ 4.5</div>
                            </div>
                            <div class="middle">
                                <a class="order" href="#">أطلب</a>
                            </div>
                        </div>';
                }
            } else {
                echo "<p>لا يوجد فنيين متاحين حسب البحث.</p>";
            }
            ?>
    <script src="/js/TechnicalOrder.js">
    </script>
</body>

</html>