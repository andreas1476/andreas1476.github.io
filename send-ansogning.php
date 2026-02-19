<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $webhookurl = "https://discord.com/api/webhooks/1474057895816593662/2yz52oYSdl2Kka7R8xrDXIgPfOgC3LM1yDbfoGXcplj7t1dOfKQocLY_3-o7_dccTNnB";

    // Indsamle data fra formular
    $navn = htmlspecialchars($_POST['navn']);
    $alder = htmlspecialchars($_POST['alder']);
    $discord = htmlspecialchars($_POST['discord']);
    $ingame = htmlspecialchars($_POST['ingame']);
    $erfaring = htmlspecialchars($_POST['erfaring']);
    $motivation = htmlspecialchars($_POST['motivation']);
    $timer = htmlspecialchars($_POST['timer']);

    // Forbered embed til Discord
    $message = [
        "embeds" => [
            [
                "title" => "📥 Ny Staff Ansøgning",
                "color" => hexdec("ffaa00"), // Gul
                "fields" => [
                    ["name" => "Navn", "value" => $navn, "inline" => true],
                    ["name" => "Alder", "value" => $alder, "inline" => true],
                    ["name" => "Discord", "value" => $discord],
                    ["name" => "Ingame Navn", "value" => $ingame],
                    ["name" => "Tidligere Erfaring", "value" => $erfaring],
                    ["name" => "Motivation", "value" => $motivation],
                    ["name" => "Timer pr. uge", "value" => $timer],
                    ["name" => "hvorfor skal vi vælge dig", "value" => $hvorfor dig],
                ],
                "footer" => ["text" => "Staff Ansøgnings System"],
                "timestamp" => date("c")
            ]
        ]
    ];

    // Send til Discord
    $ch = curl_init($webhookurl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($ch);
    curl_close($ch);

    echo "success";
}
?>
