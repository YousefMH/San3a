<?php
session_start();
include "DBconn/conn.php";
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}
include "validation.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="website icon" type="png" href="Resorces/Frame 16.png">
    <link rel="stylesheet" href="./style/Contact Us.css">
    <link rel="stylesheet" href="./style/footer-ContactUs.css">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            p.error{
                color: red;
            }
            p.message{
                color:red;
                text-align: center;
            }
        </style>
</head>

<body>
    

    <?php include "header.php"; ?> <!-- header -->

    <div class="support-form">
        <h2> هل تحتاج إلي المساعدة ؟</h2>
         <form method="post" name="validation">
            <div class="name">
                <input type="text" placeholder="الاسم بالكامل" name="name" id="name" value="<?php echo htmlspecialchars($values['name']); ?>" required>
                <p style="color: red;"><?php echo $errors['name']; ?></p>
            </div>

            <div class="phone">
                <input type="text" placeholder="رقم الهاتف" name="phone" id="phone" value="<?php echo htmlspecialchars($values['phone']); ?>" required>
                <p style="color: red;"><?php echo $errors['phone']; ?></p>
            </div>

            <div class="email">
                <input type="email" placeholder="البريد الإلكتروني" name="email" id="email" value="<?php echo htmlspecialchars($values['email']); ?>" required>
                <p style="color: red;"><?php echo $errors['email']; ?></p>
            </div>

            <div class="date">
                <input type="date" name="date" id="date" value="<?php echo htmlspecialchars($values['date']); ?>" required>
                <p style="color: red;"><?php echo $errors['date']; ?></p>
            </div>

            <div class="submit">
                <button type="submit" name="submit">إرسال</button>
                <p style="color: green;"><?php echo $submit_message; ?></p>
            </div>
        </form>
    </div>


   
</body>
</html>

<?php
include("footer.php");
?>