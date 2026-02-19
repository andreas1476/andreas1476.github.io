<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $webhookurl = "https://discord.com/api/webhooks/1474057895816593662/2yz52oYSdl2Kka7R8xrDXIgPfOgC3LM1yDbfoGXcplj7t1dOfKQocLY_3-o7_dccTNnB";

    $navn = htmlspecialchars($_POST['navn']);
    $alder = htmlspecialchars($_POST['alder']);
    $discord = htmlspecialchars($_POST['discord']);
    $ingame = htmlspecialchars($_POST['ingame']);
    $tidligere_staff = htmlspecialchars($_POST['tidligere_staff']);
    $erfaring_detaljer = htmlspecialchars($_POST['erfaring_detaljer']);
    $motivation = htmlspecialchars($_POST['motivation']);
    $bidrag = htmlspecialchars($_POST['bidrag']);
    $konflikt = htmlspecialchars($_POST['konflikt']);
    $timer = htmlspecialchars($_POST['timer']);

    $message = [
        "embeds" => [
            [
                "title" => "📥 Ny Staff Ansøgning",
                "color" => hexdec("ff6600"),
                "fields" => [
                    ["name" => "Navn", "value" => $navn, "inline" => true],
                    ["name" => "Alder", "value" => $alder, "inline" => true],
                    ["name" => "Discord", "value" => $discord],
                    ["name" => "Ingame", "value" => $ingame],
                    ["name" => "Tidligere Staff", "value" => $tidligere_staff],
                    ["name" => "Erfaring", "value" => $erfaring_detaljer],
                    ["name" => "Motivation", "value" => $motivation],
                    ["name" => "Bidrag", "value" => $bidrag],
                    ["name" => "Konflikthåndtering", "value" => $konflikt],
                    ["name" => "Timer pr. uge", "value" => $timer],
                ]
            ]
        ]
    ];

    $ch = curl_init($webhookurl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_exec($ch);
    curl_close($ch);

    echo "Ansøgning sendt!";
}
?>
