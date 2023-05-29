<?php
$Amount = $_REQUEST ["amount"];
$Authority = $_GET['Authority'];
$data = array("merchant_id" => "e2fb066b-9069-435f-8253-f3aec2cd79f6", "authority" => $Authority, "amount" => $Amount);
$jsonData = json_encode($data);
$ch = curl_init('https://api.zarinpal.com/pg/v4/payment/verify.json');
curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
));

$result = curl_exec($ch);
curl_close($ch);
$result = json_decode($result, true);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    if ($result['data']['code'] == 100) {
        
header("Location: https://sorenafile.ir/pay/reciept?Amount=$Amount");
}
}







		



?>
