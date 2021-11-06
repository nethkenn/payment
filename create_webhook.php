<?php
require_once 'config.php';
 
if (isset($_POST['submit'])) {
    try {
        if ($_POST['type'] == 'paymongo') {
            $response = $paymongo->post('webhooks', [
                'json' => [
                    'data' => [
                        'attributes' => [
                            'url' => $_POST['url'],
                            'events' => [
                                'source.chargeable',
                                'payment.paid',
                                'payment.failed',
                            ],
                        ],
                    ],
                ],
            ]);

            header("Location: webhooks.php");
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}