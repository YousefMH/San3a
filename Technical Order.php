<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إطلب فني</title>
    <link rel="stylesheet" href="Technical Order.css">
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


    <div class="search-section">
        <h2>اطلب فني</h2>
        <div class="filters">
            <button onclick="searchTechnicians()">بحث</button>
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
                <option value="6 أكتوبر" >6 أكتوبر</option>
            </select>
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
            
            <div class="card">
                <div class="right">
                    <h3>كريم محمد</h3>
                    <p>نجار</p>
                    <p>الدقي</p>
                </div>
                <div class="left">
                   <a href=""><img src="Resorces/man.png" alt="فني" ></a> 
                    <div class="rating">4.5⭐</div>
                </div>
            </div>

            <div class="card">
                <div class="right">
                    <h3>كريم محمد</h3>
                    <p>نجار</p>
                    <p>الدقي</p>
                </div>
                <div class="left">
                   <a href=""><img src="Resorces/man.png" alt="فني" ></a> 
                    <div class="rating">4.5⭐</div>
                </div>
            </div>


            <div class="card">
                <div class="right">
                    <h3>كريم محمد</h3>
                    <p>نجار</p>
                    <p>الدقي</p>
                </div>
                <div class="left">
                   <a href=""><img src="Resorces/man.png" alt="فني" ></a> 
                    <div class="rating">4.5⭐</div>
                </div>
            </div>

            <div class="card">
                <div class="right">
                    <h3>كريم محمد</h3>
                    <p>نجار</p>
                    <p>الدقي</p>
                </div>
                <div class="left">
                   <a href=""><img src="Resorces/man.png" alt="فني"></a> 
                    <div class="rating">4.5⭐</div>
                </div>
            </div>


            <div class="card">
                <div class="right">
                    <h3>كريم محمد</h3>
                    <p>نجار</p>
                    <p>الدقي</p>
                </div>
                <div class="left">
                   <a href=""><img src="Resorces/man.png" alt="فني"></a> 
                    <div class="rating">4.5⭐</div>
                </div>
            </div>


            <div class="card">
                <div class="right">
                    <h3>كريم محمد</h3>
                    <p>نجار</p>
                    <p>الدقي</p>
                </div>
                <div class="left">
                   <a href=""><img src="Resorces/man.png" alt="فني"></a> 
                    <div class="rating">4.5⭐</div>
                </div>
            </div>


            <div class="card">
                <div class="right">
                    <h3>كريم محمد</h3>
                    <p>نجار</p>
                    <p>الدقي</p>
                </div>
                <div class="left">
                   <a href=""><img src="Resorces/man.png" alt="فني" ></a> 
                    <div class="rating">4.5⭐</div>
                </div>
            </div>


            <div class="card">
                <div class="right">
                    <h3>كريم محمد</h3>
                    <p>نجار</p>
                    <p>الدقي</p>
                </div>
                <div class="left">
                   <a href=""><img src="Resorces/man.png" alt="فني" ></a> 
                    <div class="rating">4.5⭐</div>
                </div>
            </div>


            <div class="card">
                <div class="right">
                    <h3>كريم محمد</h3>
                    <p>نجار</p>
                    <p>الدقي</p>
                </div>
                <div class="left">
                   <a href=""><img src="Resorces/man.png" alt="فني"></a> 
                    <div class="rating">4.5⭐</div>
                </div>
            </div>

        
        </div>
        <br> <br>
    </div>

    
    <script src="TechnicalOrder.js">



    

    </script>
</body>
</html>