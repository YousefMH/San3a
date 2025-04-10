<?php
    session_start();
    include "DBconn/conn.php";
    if(!isset($_SESSION['ID'])){
        header("Location:index.php");
        exit();
    }else{
        $currentID = $_SESSION['ID'];
    }
    $GetCurrentUserData = "SELECT first_name, last_name, email, national_id, phone FROM users WHERE user_id = $currentID";
    $result = mysqli_query($conn, $GetCurrentUserData);

    $cEmail = "";
    $cNID   = "";
    $cPhone = "";
    $cFname = "";
    $cLname = "";
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $cEmail = $row['email'];
        $cNID   = $row['national_id'];
        $cPhone = $row['phone'];
        $cFname = $row['first_name'];
        $cLname = $row['last_name'];
    } else {
        echo "No user found";
    }

    if(isset($_POST["btnSave"])){
        if(isset($_POST["email"]) && isset($_POST["NID"]) && isset($_POST["phone"]) && $_POST["fname"] && $_POST["sname"]){
            $nEmail = $_POST["email"];
            $nNID   = $_POST["NID"];
            $nPhone = $_POST["phone"];
            $nFname = $_POST["fname"];
            $nLname = $_POST["sname"];

            $query = "UPDATE users SET email = '$nEmail', national_id = '$nNID', phone = '$nPhone', first_name = '$nFname', last_name = '$nLname'
            WHERE user_id = $currentID";
            $checkIfEmailExistsQuiery = "SELECT email FROM users WHERE email = '$nEmail' AND email != '$cEmail'"; // make suer that we don't have the same email in DB
            $EmailChecker = mysqli_query($conn,$checkIfEmailExistsQuiery);

            if(mysqli_num_rows($EmailChecker) == 0){
                if (mysqli_query($conn, $query)) {
                    echo '<div style="padding: 20px; border: 2px solid rgb(54, 244, 111); border-radius: 5px; background-color:rgb(224, 248, 215); color: #721c24; font-family: Arial, sans-serif; direction: rtl; text-align: right;">
                    تم تعديل البيانات
                    </div>';
                }else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            }else{
                echo '<div style="padding: 20px; border: 2px solid #f44336; border-radius: 5px; background-color: #f8d7da; color: #721c24; font-family: Arial, sans-serif; direction: rtl; text-align: right;">
                <strong>خطأ</strong> هذا الايميل موجود بالفعل
                </div>';}
        }else{
            echo '<div style="padding: 20px; border: 2px solid #f44336; border-radius: 5px; background-color: #f8d7da; color: #721c24; font-family: Arial, sans-serif; direction: rtl; text-align: right;">
            <strong>خطأ</strong> برجاء التأكد من أن جميع المدخلات صحيحة
            </div>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/prof.css">
</head>
<body >
    
    <?php include "header.php";?> <!-- header -->

    <div class="form-container">
        <div class="profile-section">
            <div class="profile-picture"></div>
            <label for="upload" class="upload-icon">📷</label>
            <input type="file" id="upload" hidden>
        </div>

        <form method="POST">
            <div class="name-fields">
                <input type="text" placeholder="الاسم الثاني" name="sname" id="sname">
                <input type="text" placeholder="الاسم الأول" name="fname" id="fname">
            </div>
            <input type="email" placeholder="البريد الإلكتروني" name=" email" id="email">
            <input type="text" placeholder="الرقم القومي" name="NID" id="NID">
            <input type="tel" placeholder="رقم الهاتف" name="phone" id="phone">

            <div class="buttons">
                <button class="save" type="submit" name="btnSave">حفظ</button>
            </div>
        </form>
    </div>




    <script>

        function navigateToPage(value) {
            if (value) {
                window.location.href = value;
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("fname").value = "<?php echo addslashes($cFname); ?>";
            document.getElementById("sname").value = "<?php echo addslashes($cLname); ?>";
            document.getElementById("email").value = "<?php echo addslashes($cEmail); ?>";
            document.getElementById("NID").value = "<?php echo addslashes($cNID); ?>";
            document.getElementById("phone").value = "<?php echo addslashes($cPhone); ?>";
        });

    </script>


</body>
</html>