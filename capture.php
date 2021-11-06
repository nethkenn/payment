<?php
    $db->query("UPDATE admin_payments SET payment_status = 'faield' WHERE payment_id = '". $source['id'] ."' ");

    if ($_POST['data']['attributes']['type'] == 'source.chargeable') {
        $source = $_GET['data']['attributes']['data'];

        $paymentDetails = $db->query("SELECT * FROM student_payments WHERE payment_id = '".$source['id']."'")->fetch_all(MYSQLI_ASSOC)[0];

        if ($paymentDetails) {
            try {
                $response = $paymongo->post('payments', [
                    'json' => [
                        'data' => [
                            'attributes' => [
                                'source' => [
                                    'id' => $source['id'],
                                    'type' => 'source',
                                ],
                                'amount' => $paymentDetails['amount'],
                                'currency' => 'PHP',
                            ],
                        ],
                    ],
                ]);

                $response = json_decode($response->getBody(), true);

                $db->query("UPDATE student_payments SET payment_status = 'approved', payer_id = '". $response['payment']['id'] ."' WHERE payment_id = '". $source['id'] ."' ");
                $db->query("UPDATE admin_payments SET payment_status = 'approved' WHERE payment_id = '". $source['id'] ."' ");
            } catch (Exception $e) {
                $db->query("UPDATE admin_payments SET payment_status = 'failed' WHERE payment_id = '". $source['id'] ."' ");
                $db->query("UPDATE admin_payments SET payment_status = 'faield' WHERE payment_id = '". $source['id'] ."' ");
            }
        }
    }

    http_response_code(200);
?>