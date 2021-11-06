<?php
require_once "vendor/autoload.php";
 
use Omnipay\Omnipay;
use GuzzleHttp\Client;

define('CLIENT_ID', 'AULBTZnNZ0ppA8ElCA7olOztldcY4oIYHL95s6vJzt6qRHTAV1XHBTX3-NuUDe3nd2BO7uYoULVYH-6i');
define('CLIENT_SECRET', 'EFlULzKmxU239A3ZW1qSavakUgnvaFc_TP0tdg2QS6enlnCreMidcmPKsKoBWgpXPNyPJim62X_H-3KY');
 
define('PAYPAL_RETURN_URL', 'http://localhost/payment/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/payment/cancel.php');
define('CURRENCY', 'PHP'); // set your currency here
//PAYMAYA CREDENTIALS
define('PAYMAYA_API_URL', 'https://pg-sandbox.paymaya.com');
define('PAYMAYA_PUBLIC_KEY', 'pk-MOfNKu3FmHMVHtjyjG7vhr7vFevRkWxmxYL1Yq6iFk5');
define('PAYMAYA_SECRET_KEY', 'sk-NMda607FeZNGRt9xCdsIRiZ4Lqu6LT898ItHbN4qPSe');
//PAYMONGO CREDENTIALS
define('PAYMONGO_API_URL', 'https://api.paymongo.com/v1/');
define('PAYMONGO_PUBLIC_KEY', 'pk_test_ooqAtazQnoVahM7BD5fBeGkz');
define('PAYMONGO_SECRET_KEY', 'sk_test_md3LwkVAeCqN4dHq9VGzMirL');
 
// Connect with the database
$db = new mysqli('localhost', 'root', 'password', 'school'); 
 
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}

//PAYPAL INITIALIZATION
$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live


//PAYMAYA INITIALIZATION
$paymayaPayment = new Client([
    'base_uri' => PAYMAYA_API_URL.'/payby/v2/paymaya/',
    'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Basic '. base64_encode(PAYMAYA_PUBLIC_KEY.':'),
    ],
]);

//PAYMONGO INITIALIZATION
$paymongo =  new Client([
    'base_uri' => PAYMONGO_API_URL, 
    'Accept' => 'application/json',
    'Content-Type' => 'application/json',
    'auth' => [PAYMONGO_SECRET_KEY, null],
]);