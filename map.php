<?php
    session_start();
    if(!isset($_SESSION['ID'])){
        header("Location:index.php");
        exit();
    }

?>
<?php
include("DBconn/conn.php");
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أقرب فني ليك</title>
     <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="./style/map.css">
    <link rel="stylesheet" href="./style/footer.css">
    <link rel="stylesheet" href="./style/general.css">
   

 <style>
        
        body {
           
          
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
            border: 3px solid darkgoldenrod ;
            border-radius: 10px;
        }

       .search-container {
            
            width: 20%;
            height: 500px;
            float: right;
            padding: 20px;
            margin-right: 5%;
            margin-top: 2%;
            margin-bottom: 5%;
            border: 3px solid darkgoldenrod ;
            border-radius: 10px;
            box-sizing: border-box; /* ✅ هذا مهم */
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

      .form-input {
            border: none;
            width: 100%;  
            padding: 10px;
            border: 1px solid white;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box; 
        }
        .selection{
            color: white;
            width: 100%;  
            padding: 10px;
            border: none;
            border: 1px solid white;
            background-color: transparent;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box; 
            font-family: "Tajawal", sans-serif;
            margin-bottom: 40px;
        }
       

        button {
            padding: 10px;
            margin-top: 110px ;
            font-size: 18px;
            background-color: darkgoldenrod ;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
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

    <?php include "header.php";?> <!-- header -->

    

   <div class="search-container">
        <h2>إبحث عن أقرب صنايعى</h2>
        <form id="searchForm">
            <label for="jobFilter">نوع الصنايعي:</label>
           <select id="jobFilter" class="selection">
                <option value="" >-- اختر المهنة --</option>
                <option value="سباك" >سباك</option>
                <option value="كهربائي" >كهربائي</option>
                <option value="نجار" >نجار</option>
                <option value="حداد" >حداد</option>
            </select>

            <label for="locationInput">المكان:</label>
           <input type="text" id="locationInput" class="form-input" placeholder="مثلاً: المعادي, القاهرة" />

            <button type="submit" class="search-btn">بحث</button>
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
