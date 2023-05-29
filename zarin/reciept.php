<?php



$result = $_GET['result'];
$OrderId = $_GET['OrderId'];
$Amount = $_GET['Amount'];
$resid = $_GET['resid'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>تاییدیه پرداخت</title>
    <meta charset="UTF-8">
    <meta name="description" content="درگاه تراکنش های مالی امن">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" sizes="32x32" href="images/favicon.ico">
    <link rel="stylesheet" href="bootstrap/style.css">


</head>
<body>
    

   
   <div class="main-menu" id="main-menu">
       <div class="topnav">
                <a class="active" href="https://sorenafile.ir/pay/">صفحه اصلی</a>
                <a href="https://sorenafile.ir/shop" target="_blank">محصولات</a>
             <a href="https://sorenafile.ir/blog" target="_blank">وبلاگ</a>
             <a href="https://sorenafile.ir/about-us" target="_blank">درباره ما</a>
        </div>

<div class="info-panel">
    <span id="infopanel" class="title-info">نام پذیرنده:</span>
    <span id="infopanel" class="title-info">سورنا فایل</span>
 
    <a href="https://sorenafile.ir"><img class="logo" src="images/favicon.ico" alt="logo"></a>
</div>

<div>
    
<img class="head-image-confirm" src="images/bank.png" alt="head-confirm">


<button class="button"> وضعیت پرداخت : <?php
$result
?></button>

<button class="button"> مبلغ پرداختی : <?php echo $Amount ?> ریال</button> 




    
</div>



    </div>
   
   

</body>
</html>