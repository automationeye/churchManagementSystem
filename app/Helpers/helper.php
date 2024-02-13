<?php

if (!function_exists('sendSmsUsingCurl')) {
	function sendSmsUsingCurl($recipient, $senderId, $messageType, $message){
    $url = 'https://sms.coptic.co.ke/api/v3/sms/send';

    $headers = [
        'Authorization: Bearer 8|xOJrpxUxElUvaWhsQ6cA54AZ6fxdLh2moxyYZLUu9db2c618',
        'Accept: application/json',
        'Content-Type: application/json',
    ];

    $data = [
        'recipient' => $recipient,
        'sender_id' => $senderId,
        'type' => $messageType,
        'message' => $message,
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    try {
        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($statusCode >= 200 && $statusCode < 300) {
            // Request was successful
            $responseData = json_decode($response, true);

            // Add your logic here based on the response

            return ['success' => true, 'message' => $responseData];
        } else {
            // Request failed
            return ['success' => false, 'message' => 'Request failed with status code: ' . $statusCode];
        }
    } catch (\Exception $e) {
        // Handle any exceptions that occur during the cURL request
        return ['success' => false, 'message' => $e->getMessage()];
    } finally {
        curl_close($ch);
    }
}
}

?>