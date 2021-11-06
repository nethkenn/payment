<?php require "dbconn.php"?>
<html>
<head>
<title>View Payment</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<main id="cart-main">

    <div class="site-title text-center">
        <div><img id="logoImage" src="./assets/checked.png" alt=""></div>
    </div>

</main>

<center>
<p class="font-title">
<?php
require_once 'config.php';
use GuzzleHttp\Client;
 
// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $gateway->completePurchase(array(
        'payer_id'             => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();
 
    if ($response->isSuccessful()) {
        // The customer has successfully paid.
        $arr_body = $response->getData();
 
        $payment_id = $arr_body['id'];
        $payer_id = $arr_body['payer']['payer_info']['payer_id'];
        $payer_email = $arr_body['payer']['payer_info']['email'];
        $amount = $arr_body['transactions'][0]['amount']['total'];
        $currency = PAYPAL_CURRENCY;
        $payment_status = $arr_body['state'];
 
        // Insert transaction data into the database
        $isPaymentExist = $db->query("SELECT * FROM student_payments WHERE payment_id = '".$payment_id."'");
 
        if($isPaymentExist->num_rows == 0) {
            $insert = $db->query("INSERT INTO student_payments(payment_id, payer_id, payer_email, amount, currency, payment_status) VALUES('". $payment_id ."', '". $payer_id ."', '". $payer_email ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
		    $insert = $db->query("INSERT INTO admin_payments(payment_id,  payer_id, payer_email, amount, currency, payment_status) VALUES('". $payment_id ."', '". $payer_id ."', '". $payer_email ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
        }
 
        echo "Payment is successful.<br> Your transaction id is: ". $payment_id;
    } else {
        echo $response->getMessage();
    }
} else if (array_key_exists('success', $_GET) && array_key_exists('type', $_GET)) {
    var_dump($_GET);
} else if (array_key_exists('success', $_GET) && array_key_exists('types', $_GET)) {
    try  {
        if ($_GET['success']) {
            $paymayaDetails = new Client([
                'base_uri' => PAYMAYA_API_URL.'/payments/v1/',
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic '. base64_encode(PAYMAYA_SECRET_KEY.':'),
                ],
            ]);
    
            $response = $paymayaDetails->get("/payments/v1/payment-rrns/{$_GET['referenceNumber']}");
                
            $response = json_decode($response->getBody(), true)[0];

            $payment_id = $response['id'];
            $payer_id = $response['fundSource']['id'];
            $payer_email = $response['fundSource']['details']['email'];
            $amount = (int)$response['amount'];
            $currency = $response['currency'];
            $payment_status = $response['status'] == 'PAYMENT_SUCCESS'
                ? 'approved'
                : 'pending';
            
             // Insert transaction data into the database
            $isPaymentExist = $db->query("SELECT * FROM student_payments WHERE payment_id = '".$payment_id."'");
    
            if($isPaymentExist->num_rows == 0) {
                $insert = $db->query("INSERT INTO student_payments(payment_id, payer_id, payer_email, amount, currency, payment_status) VALUES('". $payment_id ."', '". $payer_id ."', '". $payer_email ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
                $insert = $db->query("INSERT INTO admin_payments(payment_id,  payer_id, payer_email, amount, currency, payment_status) VALUES('". $payment_id ."', '". $payer_id ."', '". $payer_email ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
            }
    
            echo "Payment is successful.<br> Your transaction id is: ". $payment_id;
        } else {
            echo 'Transaction is declined';
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}else {
    echo 'Transaction is declined';
}
?></h1>

<button><a href="index.php" >Home</button>
<button><a href="view.php" >View</button>
	  
<script>
function changeStatus()
{
	var status = document.getElementById("reason");
	if(status.value == "Other Concerns:")
	{
		document.getElementById("other").style.visibility="visible";
	}
	else 
	{
		document.getElementById("other").style.visibility="hidden";
	}
	
}
</script>
