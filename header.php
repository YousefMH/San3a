<?php

$orders = '';
$near = '<a href="map.php">اقرب فني ليك</a>';
$orderTech = '<a href="Technicians.php">اطلب فني</a>';
$shop = '<a href="shop.php">قطع الغيار</a>';

if(isset($_SESSION['role']) && $_SESSION['role'] == "technician") {
    $orders = '<a href="Control.php">الطلبات</a>';
    $near = '';
    $orderTech = '';
    $shop = '';
}
?>

<div class="header">
    <img src="Resorces/Frame 16.png" alt="" class="logo" />
    <div class="link">

        <?php echo $near ?>
        <a href="Contact-Us.php">الدعم الفني</a>
        <?php echo $orderTech?>
        <?php echo $shop ?>
        <?php echo $orders ?>
        <a href="Home.php">الصفحة الرئيسية</a>
        <select id="specialty" class="manage" onchange="location = this.value;">
      <option>🧑 <?php echo $_SESSION['fname']?></option>
      <option value="prof.php">ادارة الحساب</option>
      <option value="cart.php">عربة التسوق</option>
      <option value="logout.php">تسجيل الخروج</option>
    </select>
    </div>
</div>