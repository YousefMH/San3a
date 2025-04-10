<?php
    session_start();
    if(!isset($_SESSION['ID'])){
        header("Location:index.php");
        exit();
    }

    include "DBconn/conn.php";

    $selectLocationsQuiery = "SELECT area FROM technicians";
    $selectedLocations = mysqli_query($conn,$selectLocationsQuiery);
    $selectedSpecialtiesQuiery = "SELECT specialty FROM technicians";
    $selectedSpecialties = mysqli_query($conn,$selectedSpecialtiesQuiery);
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
    }else{
        $SearchQuery = "SELECT users.first_name,users.last_name,users.user_id,technicians.specialty,technicians.province,technicians.area,technicians.visit_price,technicians.work_hours
        FROM technicians 
        JOIN users ON users.user_id = technicians.user_id";
    $result = mysqli_query($conn,$SearchQuery);    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اطلب فني</title>
    <link rel="stylesheet" href="./style/Technical Order.css">
    <style>
        a.order {
            padding: 10px;
            color: black;
            border-radius: 10px;
            background-color: #b97f07;
            text-decoration: none;
        }

        a.order:hover {
            background-color: #f0b22b;
        }
    </style>
</head>
<body>

    <?php include "header.php";?> <!-- header -->

    <form method="POST">
        <div class="search-section">
            <h2>اطلب فني</h2>
            <div class="filters">
                <button onclick="searchTechnicians()" name="BtnSearch" type="submit">بحث</button>
                <select id="specialty" name="specialty">
                <option value=" " disabled selected>اختر التخصص</option>
                <?php 
                if(isset($selectedSpecialties)){
                    while ($row = mysqli_fetch_assoc($selectedSpecialties)) {
                        echo  '<option value=' . $row["specialty"] . '>' . $row["specialty"] . '</option>';
                    }
                }?>
                </select>
            <select id="province" name="province">
                <option disabled selected>اختيار المحافظة</option>
                <option value="القاهرة">القاهرة</option>
                <option value="الإسكندرية">الإسكندرية</option>
            </select>
            <select id="area" name="area">
                <option disabled selected>اختيار المنطقة</option>
                <?php 
                if(isset($selectedLocations)){
                    while ($row = mysqli_fetch_assoc($selectedLocations)) {
                        echo  '<option value=' . $row["area"] . '>' . $row["area"] . '</option>';
                    }
                }?>
            </select>
            </div>
        </div>
    </form>

    <div class="technicians">
        <h2>أفضل ما لدينا</h2>
      
        <div class="categories">
        </div>
        <div id="technicians-list" class="cards">
        <?php
            if(isset($result)){
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card">
                            <div class="right">
                                <h3>' . $row['first_name'] . ' ' . $row['last_name'] . '</h3>
                                <p>' . $row['specialty'] . '</p>
                                <p>' . $row['area'] . '</p>
                            </div>
                            <div class="left">
                                <a href="#"><img src="Resorces/man.png" alt="فني"></a>
                                <div class="rating">⭐ 4.5</div>
                            </div>
                            <div class="middle">
                                <a class="order" href="order.php?id='.$row['user_id'].'">أطلب</a>
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