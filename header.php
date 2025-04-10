<?php

$orders = '';

if (isset($_SESSION['role']) && $_SESSION['role'] == "technician") {
    $orders = '<a href="Control.php">الطلبات</a>';
}
?>

<div class="header">
    <img src="Resorces/Frame 16.png" alt="" class="logo" />
    <div class="link">

        <a href="map.php">اقرب فني ليك</a>
        <a href="Contact-Us.php">الدعم الفني</a>
        <a href="Technicians.php">اطلب فني</a>
        <a href="shop.php">قطع الغيار</a>
        <?php echo $orders ?>
        <a href="Home.php">الصفحة الرئيسية</a>
        <select id="specialty" class="manage" onchange="location = this.value;">
      <option>🧑 حسابك</option>
      <option value="prof.php">ادارة الحساب</option>
      <option value="cart.php">عربة التسوق</option>
      <option value="logout.php">تسجيل الخروج</option>
    </select>
    </div>
</div>