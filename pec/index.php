
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="درگاه تراکنش های مالی امن">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" sizes="32x32" href="images/favicon.ico">
    <link rel="stylesheet" href="bootstrap/style.css">
    <title>درگاه پرداخت سورنا</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type='text/javascript'>
function comma_digit(t)
{
	$(t).val(function(index, value) {
		return value
		.replace(/\./g, '000')
		.replace(/\D/g, '')
		.replace(/\B(?=(\d{3})+(?!\d))/g, ",") 
		;
	});
}
function show_input() {

	var price = $('#input_price').val().replace(/\,/g, '');
	alert(price);
}
</script>
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
<form id="form" method="POST" action="payment">
 
<img class="head-image" src="images/bank.png" alt="head">

<input autocomplete="off" maxlength="11" name="Amount" id="Amount" placeholder="مبلغ را به ریال وارد کنید" data-validate="required" class="inputAmount" type="text" onKeyup="comma_digit(this)" value="" required>


<!--<input autocomplete="off" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" name="sellid" id="sellid" placeholder="ایدی فروشنده را وارد کنید" data-validate="" class="inputAmount" type="number" value="" data-validate="required" required>-->


</div>

<button class="draw" type="submit">پرداخت</button>
<div class="header"><span>پرداخت ایمن با درگاه پارسیان</span></div>

</form>
</div>



</body>
</html>