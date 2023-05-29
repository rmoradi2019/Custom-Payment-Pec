<?php
session_start();

$seller = $_POST["sellid"];
$_SESSION['sellidv'] = $seller;

?>
<?php

$amount1 = $_POST['Amount'] ? $_POST['Amount'] : "100" ;
$amount = (int)str_replace(',', '', $amount1);

$data = array("merchant_id" => "e2fb066b-9069-435f-8253-f3aec2cd79f6",
    "amount" => $amount,
    "callback_url" => "https://sorenafile.ir/pay/zarin/Verification",
    "description" => "پرداخت مستقیم",
    "metadata" => [ "email" => "rmoradi2019@gmail.com","mobile"=>"09052243521"],
    );
$jsonData = json_encode($data);
$ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
));

$result = curl_exec($ch);
$err = curl_error($ch);
$result = json_decode($result, true, JSON_PRETTY_PRINT);
curl_close($ch);



if ($err) {
    echo "cURL Error #:" . $err;
} else {
    if (empty($result['errors'])) {
        if ($result['data']['code'] == 100) {
            header('Location: https://www.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
        }
    } else {
         echo'Error Code: ' . $result['errors']['code'];
         echo'message: ' .  $result['errors']['message'];

    }
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
			<?php if (!empty($result['errors'])) ?>
				<div class="alert alert-danger alert-dismissible" role="alert"><?php echo'message: ' .  $result['errors']['message']; ?></div>
			
			<a class="button" href="https://sorenafile.ir/pay/">بازگشت به خانه</a>
	
			</div>
		</div>
	</div>
</body>
</html>
