<?php
require_once 'config.php';
 
if (isset($_POST['submit'])) {
    try {
        switch ($_POST['paymentMethod']) {
            case 'paypal':
                $response = $gateway->purchase(array(
                    'amount' => $_POST['amount'],
                    'currency' => CURRENCY,
                    'returnUrl' => PAYPAL_RETURN_URL,
                    'cancelUrl' => PAYPAL_CANCEL_URL,
                ))->send();
         
                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    echo $response->getMessage();
                }
            break;
            
            case 'paymaya':
                $referenceNumber = time() . rand(10*45, 100*98);
                $url = 'http://payment.test/success.php';
                $failedUrl = "http://payment.test/cancel.php?referenceNumber={$referenceNumber}";
    
                $response = $paymayaPayment->post('payments', [
                    'json' => [
                        'requestReferenceNumber' => $referenceNumber,
                        'totalAmount' => [
                            'currency' => CURRENCY,
                            'value' => $_POST['amount']
                        ],
                        'redirectUrl' => [
                            'success' => "{$url}?success=1&type=wallet_payment&referenceNumber={$referenceNumber}",
                            'failure' => $failedUrl,
                            'cancel' => $failedUrl,
                        ]
                    ],
                ]);
                
                $response = json_decode($response->getBody(), true);
                
                
                header("Location: {$response['redirectUrl']}");
            break;

            case 'gcash':
                $isGcash = true;

            case 'grabpay':
                $type = isset($isGcash) ? 'gcash' : 'grab_pay';
                $url = 'http://payment.test/success.php';
                $failedUrl = "http://payment.test/cancel.php";
                
                $response = $paymongo->post('sources', [
                        'json' => [
                            'data' => [
                                'attributes' => [
                                    'type' => $type,
                                    'amount' => intval($_POST['amount'] * 100),
                                    'currency' => CURRENCY,
                                    'redirect' => [
                                        'success' => "{$url}?success=1&type=charged",
                                        'failed' => "{$failedUrl}success=0&type=charged",
                                    ],
                                ],
                            ],
                        ],
                    ]);

                $response = json_decode($response->getBody(), true)['data'];
                
                header("Location: {$response['attributes']['redirect']['checkout_url']}");
            break;

            default:
            break;
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}