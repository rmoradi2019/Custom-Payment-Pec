<?php
session_start();

/*$seller = $_POST["sellid"];
$_SESSION['sellidv'] = $seller;*/

?>

<?php
	ini_set ( "soap.wsdl_cache_enabled", "0" );
	
	
	$PIN = 'RR6m11RBSEcn088UTp57';
	$wsdl_url = "https://pec.shaparak.ir/NewIPGServices/Sale/SaleService.asmx?WSDL";
	$site_call_back_url = "https://sorenafile.ir/pay/pec/confirm";
	
    
	$amount1 = $_POST['Amount'] ? $_POST['Amount'] : "100" ;
	$amount = (int)str_replace(',', '', $amount1);
	$order_id = rand();
	
	$params = array (
			"LoginAccount" => $PIN,
			"Amount" => $amount,
			"OrderId" => $order_id,
			"CallBackUrl" => $site_call_back_url
	);
	
	$client = new SoapClient ( $wsdl_url );
	
	try {
		$result = $client->SalePaymentRequest ( array (
				"requestData" => $params 
		) );
		if ($result->SalePaymentRequestResult->Token && $result->SalePaymentRequestResult->Status === 0) {
			header ( "Location: https://pec.shaparak.ir/NewIPG/?Token=" . $result->SalePaymentRequestResult->Token ); /* Redirect browser */
			exit ();
		}
		elseif ( $result->SalePaymentRequestResult->Status  != '0') {
			$err_msg = "(<strong> کد خطا : " . $result->SalePaymentRequestResult->Status . "</strong>) " .
			 $result->SalePaymentRequestResult->Message ;
		} 
	} catch ( Exception $ex ) {
		$err_msg =  $ex->getMessage()  ;
	}

?>


<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>پرداخت آنلاین</title>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="/js/jQuery v1.12.4.min.js"
	charset="utf-8"></script>
<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"
	charset="utf-8"></script>
<style type="text/css">
.ltr {
	direction: ltr;
}

.rtl {
	direction: rtl;
}
</style>
</head>
<body class="rtl">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">پرداخت آنلاین</div>
			<div class="panel-body">
			<?php if($err_msg):?>
				<div class="alert alert-danger alert-dismissible" role="alert"><?php echo $err_msg;?></div>
			<?php else :?>
				<div class="alert alert-danger alert-dismissible" role="alert">جوابی از طرف سرویس دهنده داده نشد</div>
			<?php endif;?>
			<a class="button" href="https://sorenafile.ir/pay/">بازگشت به خانه</a>
	
			</div>
		</div>
	</div>
</body>
</html>
