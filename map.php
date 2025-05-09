<?php
session_start();
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}



?>
<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "san3a";

$conn = new mysqli($host, $user, $password, $db);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}


$workers = [];
$sql = "SELECT * FROM workers";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $workers[] = $row;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>خريطة أقرب صنايعي</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="./style/footer.css">
    <link rel="stylesheet" href="./style/Home.css">
    <style>
        
        body {
            font-family: 'Arial', sans-serif;
          
            margin: 0;
            padding: 0;
            background: url(./Resorces/background.jpg);
            background-repeat: no-repeat;
            background-position: absolute;
            background-size: cover;
            background-attachment: fixed;
        }
        
        
        #map {
            width: 60%;
            height: 500px;
            float: left;
            margin-left: 5%;
            margin-top: 2%;
            margin-bottom: 5%;
            border: 5px solid darkgoldenrod ;
            border-radius: 10px;
        }

        .search-container {
            width: 20%;
            height: 460px;
            float: right;
            padding: 20px;
            margin-right: 5%;
            margin-top: 2%;
            margin-bottom: 5%;
            border: 5px solid darkgoldenrod ;
            border-radius: 10px;
        }

        .search-container h2 {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            font-size: 18px;
            color: white;
            direction: rtl;
        }

        select, input {
            padding: 10px;
            margin-bottom: 15px;
            border: 4px solid white;
            border-radius: 5px;
            font-size: 16px;
            
        }

        button {
            padding: 10px;
            margin-top: 80px ;
            font-size: 18px;
            background-color: darkgoldenrod ;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:rgb(238, 108, 1);
        }

        @media (max-width: 768px) {
    .main-container {
        flex-direction: column;
        align-items: stretch;
    }

    #map {
        height: 400px;
    }

    button {
        margin-top: 20px;
    }
}

    </style>
</head>
<body>
    <?php include "header.php"; ?>
    <div class="search-container">
        <h2>ابحث عن أقرب صنايعي</h2>
        <form id="searchForm">
            <label for="jobFilter">نوع الصنايعي:</label>
            <select id="jobFilter">
                <option value="">-- اختر المهنة --</option>
                <option value="سباك">سباك</option>
                <option value="كهربائي">كهربائي</option>
                <option value="نجار">نجار</option>
                <option value="حداد">حداد</option>
            </select>

            <label for="locationInput">المكان:</label>
            <input type="text" id="locationInput" placeholder="مثلاً: المعادي, القاهرة" />

            <button type="submit">بحث</button>
        </form>
    </div>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        
        const map = L.map('map').setView([29.89496, 31.261209], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(pos => {
                const userLat = pos.coords.latitude;
                const userLng = pos.coords.longitude;

                L.marker([userLat, userLng])
                    .addTo(map)
                    .bindPopup("📍 موقعك الحالي")
                    .openPopup();

                map.setView([userLat, userLng], 13);
            });
        }

      
        let allWorkers = <?php echo json_encode($workers, JSON_UNESCAPED_UNICODE); ?>;
        let mapMarkers = [];

        function renderMarkers(filteredWorkers) {
            mapMarkers.forEach(marker => map.removeLayer(marker));
            mapMarkers = [];

            filteredWorkers.forEach(worker => {
                if (worker.lat && worker.lng) {
                    const marker = L.marker([parseFloat(worker.lat), parseFloat(worker.lng)])
                        .addTo(map)
                        .bindPopup(
                            `<b>الاسم:</b> ${worker.name}<br>` +
                            `<b>🛠️ المهنة:</b> ${worker.job}<br>` +
                            `<b>📞 الهاتف:</b> <a href='tel:${worker.phone}'>${worker.phone}</a>`
                        );
                    mapMarkers.push(marker);
                }
            });
        }

        renderMarkers(allWorkers);

        document.getElementById("searchForm").addEventListener("submit", function (e) {
            e.preventDefault();
            const job = document.getElementById("jobFilter").value;
            const location = document.getElementById("locationInput").value.trim();

            let filtered = allWorkers;
            if (job) {
                filtered = filtered.filter(w => w.job === job);
            }

            if (location) {
                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(location)}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.length > 0) {
                            const loc = data[0];
                            map.setView([parseFloat(loc.lat), parseFloat(loc.lon)], 14);
                        } else {
                            alert("المكان غير معروف");
                        }
                        renderMarkers(filtered);
                    });
            } else {
                renderMarkers(filtered);
            }
        });
    </script>

</body>
</html>

<?php
include("footer.php");
?>
