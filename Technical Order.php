<?php
// Start the session and check if user is logged in
session_start();
if (!isset($_SESSION['ID'])) {
    // Redirect to login page if not authenticated
    header("Location:index.php");
    exit();
}

// Include database connection
include "DBconn/conn.php";

// Variable to hold search results
$result = null;

// Check if the form is submitted via POST and search button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['BtnSearch'])) {

    // Get selected values or use wildcard (%) if empty
    $specialtySelect = !empty($_POST['specialty']) ? $_POST['specialty'] : "%";
    $provinceSelect  = !empty($_POST['province']) ? $_POST['province'] : "%";
    $areaSelect      = !empty($_POST['area']) ? $_POST['area'] : "%";

    // Prepare SQL query using prepared statements for security
    $stmt = $conn->prepare("SELECT users.first_name, users.last_name, users.user_id, 
                                   technicians.specialty, technicians.province, 
                                   technicians.area, technicians.visit_price, 
                                   technicians.work_hours
                            FROM technicians 
                            JOIN users ON users.user_id = technicians.user_id
                            WHERE technicians.specialty LIKE ?
                            AND technicians.province LIKE ?
                            AND technicians.area LIKE ?");

    // Bind parameters to the statement
    $stmt->bind_param("sss", $specialtySelect, $provinceSelect, $areaSelect);

    // Execute the statement and get results
    $stmt->execute();
    $result = $stmt->get_result();

    // Close the statement
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إطلب فني</title>
    <link rel="stylesheet" href="./style/Technical Order.css">
    <style>
        /* Style for order button */
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

<!-- Include the header layout -->
<?php include "header.html"; ?>

<!-- Search section -->
<div class="search-section">
    <h2>اطلب فني</h2>
    <form method="post" action="">
        <div class="filters">
            <!-- Specialty selection -->
            <select name="specialty" id="specialty">
                <option value="" disabled selected>اختر التخصص</option>
                <option value="نجار">نجار</option>
                <option value="سباك">سباك</option>
                <option value="حداد">حداد</option>
                <option value="نقاش">نقاش</option>
            </select>

            <!-- Province selection -->
            <select name="province" id="province">
                <option value="" disabled selected>اختيار المحافظة</option>
                <option value="القاهرة">القاهرة</option>
                <option value="الإسكندرية">الإسكندرية</option>
            </select>

            <!-- Area selection -->
            <select name="area" id="area">
                <option value="" disabled selected>اختيار المنطقة</option>
                <option value="فيصل">فيصل</option>
                <option value="6 أكتوبر">6 أكتوبر</option>
            </select>

            <!-- Search button -->
            <button type="submit" name="BtnSearch">بحث</button>
        </div>
    </form>
</div>

<!-- Technicians section -->
<div class="technicians">
    <h2>أفضل ما لدينا</h2>

    <!-- Category buttons -->
    <div class="categories">
        <a href="All Technicals.php"><button>كل التخصصات</button></a>
        <a href="#"><button>نجار</button></a>
        <a href="#"><button>سباك</button></a>
        <a href="#"><button>حداد</button></a>
        <a href="#"><button>تكييف</button></a>
        <a href="#"><button>نقاش</button></a>
        <a href="#"><button>خدامه</button></a>
        
    </div>

    <!-- Technicians results -->
    <div id="technicians-list" class="cards">
        <?php
        // If there are results, display them
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card">
                        <div class="right">
                            <h3>' . $row['first_name'] . ' ' . $row['last_name'] . '</h3>
                            <p>التخصص: ' . $row['specialty'] . '</p>
                            <p>المنطقة: ' . $row['area'] . '</p>
                            <p>السعر: ' . $row['visit_price'] . ' جنيه</p>
                            <p>ساعات العمل: ' . $row['work_hours'] . '</p>
                        </div>
                        <div class="left">
                            <a href="#"><img src="Resorces/man.png" alt="فني"></a>
                            <div class="rating">⭐ 4.5</div>
                        </div>
                        <div class="middle">
                            <a class="order" href="order.php?technician_id=' . $row['user_id'] . '">أطلب</a>
                        </div>
                    </div>';
            }
        } else {
            // If no results, show message
            echo "<p>لا يوجد فنيين متاحين حسب البحث.</p>";
        }
        ?>
    </div>
</div>

<!-- Optional external JS -->
<script src="/js/TechnicalOrder.js"></script>
</body>

</html>
