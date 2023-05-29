
<?php
    


	$PIN = 'RR6m11RBSEcn088UTp57';
	$wsdl_url = "https://pec.shaparak.ir/NewIPGServices/Confirm/ConfirmService.asmx?WSDL";
	
	
	$Token = $_REQUEST ["Token"];
	$status = $_REQUEST ["status"];
	$OrderId = $_REQUEST ["OrderId"];
	$TerminalNo = $_REQUEST ["TerminalNo"];
	$Amount = $_REQUEST ["Amount"];
	$RRN = $_REQUEST ["RRN"];
	if ($RRN > 0 && $status == 0) {
	    
		
		$params = array (
				"LoginAccount" => $PIN,
				"Token" => $Token 
		);
		
		$client = new SoapClient ( $wsdl_url );
		
		try {
			$result = $client->ConfirmPayment ( array (
					"requestData" => $params
					
			) );
			if ($result->ConfirmPaymentResult->Status != '0') {
				$err_msg = "(<strong> کد خطا : " . $result->ConfirmPaymentResult->Status . "</strong>) " .
		 		 $result->ConfirmPaymentResult->Message ;
		 		 
			}
		} catch ( Exception $ex ) {
			$err_msg =  $ex->getMessage()  ;
		}
	}elseif($status) {
		$err_msg = "کد خطای ارسال شده از طرف بانک $status " . "";
	}else {

		$err_msg = "پاسخی از سمت بانک ارسال نشد " ;
	}
	
	


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
                <a class="active" href="https://sorenafile.ir/pay/">صفحه پرداخت</a>
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

<?php
if ($result->ConfirmPaymentResult->Status != '0') {
    
$stat11 = $result->ConfirmPaymentResult->Status;    
    
header("Location: https://sorenafile.ir/pay/pec/reciept?result=$stat11&OrderId=$OrderId");
exit();
   
}else {

$stat = $result->ConfirmPaymentResult->Status;
$resid = $result->ConfirmPaymentResult->RRN;
file_get_contents('https://raygansms.com/SendMessageWithCode.ashx?Username=rmoradi2019&Password=iqclsSQA1@1&Mobile=09052243521&Message=پرداخت'.$Amount.'');
header("Location: https://sorenafile.ir/pay/pec/reciept?OrderId=$OrderId&Amount=$Amount&stat=$stat&resid=$resid");

exit();
    }
  


?>

</body>
</html>