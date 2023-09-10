<?php
$accessToken = "EAAOJZCYnZCTRQBO0bZA7hykEFHGqZBDsbwDSvEXcteLkETZBXGgQxnFKbUwMnMjNoalluZCKqt7XUx8h3sZBBxwnXicFMIZCI9zaB3k60GyEF44hKyez4JF7xbUHKDdlAvHpSrzbBfllAQ6ZBdbH9ZBJm5y59PxI9NwQTm20NtTfDSZAAxeL36VBdKHSRhq6ILsqerd7w7kfTsELmluqtwZD";
$url = "https://graph.facebook.com/v17.0/106033692541042/messages";

$templateName = "gig_availability_notification";
$recipientId = "61469348908"; // Replace with recipient's ID
$linkParameter = "https://example.com/tasks"; // Replace with the actual link

$data = array(
    "messaging_product" => "whatsapp",
    "to" => $recipientId,
    "type" => "template",
    "template" => array(
        "name" => $templateName,
        "language" => array(
            "code" => "en"
        ),
        "components" => array(
            array(
                "type" => "BODY",
                "parameters" => array(
                    "1" => array(
                        "type" => "TEXT",
                        "text" => $linkParameter
                    )
                )
            )
        )
    )
);

$headers = array(
    "Authorization: Bearer " . $accessToken,
    "Content-Type: application/json"
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($httpCode == 200) {
    echo "Message sent successfully.";
} else {
    echo "Error sending message. HTTP code: " . $httpCode . "\n";
    echo "\nResponse: " . $response . "\n";
}

?>

<?php
$accessToken = "EAAOJZCYnZCTRQBO0bZA7hykEFHGqZBDsbwDSvEXcteLkETZBXGgQxnFKbUwMnMjNoalluZCKqt7XUx8h3sZBBxwnXicFMIZCI9zaB3k60GyEF44hKyez4JF7xbUHKDdlAvHpSrzbBfllAQ6ZBdbH9ZBJm5y59PxI9NwQTm20NtTfDSZAAxeL36VBdKHSRhq6ILsqerd7w7kfTsELmluqtwZD";
$url = "https://graph.facebook.com/v17.0/106033692541042/messages";

$templateName = "welcome_message";
$recipientId = "61469348908"; // Replace with recipient's ID
$linkParameter = "https://example.com/"; // Replace with the actual link
$linkParameter2 = "https://example.com/tasks";
$data = array(
    "messaging_product" => "whatsapp",
    "to" => $recipientId,
    "type" => "template",
    "template" => array(
        "name" => $templateName,
        "language" => array(
            "code" => "en"
        ),
        "components" => array(
            array(
                "type" => "BODY",
                "parameters" => array(
                    "1" => array(
                        "type" => "TEXT",
                        "text" => $linkParameter
                    ),
                    "2" => array(
                        "type" => "TEXT",
                        "text" => $linkParameter2
                    )
                )
            )
        )
    )
);

$headers = array(
    "Authorization: Bearer " . $accessToken,
    "Content-Type: application/json"
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($httpCode == 200) {
    echo "Message sent successfully.";
} else {
    echo "Error sending message. HTTP code: " . $httpCode . "\n";
    echo "\nResponse: " . $response . "\n";
}
?>





