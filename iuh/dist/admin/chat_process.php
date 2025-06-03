<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['prompt'])) {
    $apiKey = 'AIzaSyDcqHDGKofANTsc5YGOQxjEbF68e60sa1E'; // Thay bằng API Key của bạn
    $faq = file_get_contents("tranning.txt");
    $prompt = $faq . "\n\nNgười dùng hỏi: " . $_POST['prompt'];


    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=$apiKey";

    $data = [
        "contents" => [
            [
                "parts" => [
                    ["text" => $prompt]
                ]
            ]
        ]
    ];

    $payload = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $result = json_decode($response, true);
        if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
            echo $result['candidates'][0]['content']['parts'][0]['text'];
        } else {
            echo "Không nhận được phản hồi hợp lệ.";
        }
    } else {
        echo "Lỗi kết nối đến máy chủ Gemini.";
    }
} else {
    echo "Không có prompt được gửi.";
}
?>