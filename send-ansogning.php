<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

$webhookurl = "https://discord.com/api/webhooks/1479863435658526981/tw2iMtwmMQsl8MNCAGzBF8zhoW2XkZG8Y3ng9a2omjiJ7qlaGfA-0jwV2mZayD2icFtk";

/* Hent og rens data */

$navn = htmlspecialchars($_POST['navn'] ?? 'Ikke udfyldt');
$alder = htmlspecialchars($_POST['alder'] ?? 'Ikke udfyldt');
$discord = htmlspecialchars($_POST['discord'] ?? 'Ikke udfyldt');
$ingame = htmlspecialchars($_POST['ingame'] ?? 'Ikke udfyldt');
$why = htmlspecialchars($_POST['why'] ?? 'Ikke udfyldt');
$erfaring = htmlspecialchars($_POST['erfaring'] ?? 'Ingen erfaring skrevet');
$motivation = htmlspecialchars($_POST['motivation'] ?? 'Ikke udfyldt');
$timer = htmlspecialchars($_POST['timer'] ?? 'Ikke udfyldt');

/* Discord embed */

$data = [

"embeds" => [

[
"title" => "📥 Ny Staff Ansøgning",

"color" => hexdec("3da9fc"),

"fields" => [

[
"name" => "👤 Navn",
"value" => $navn,
"inline" => true
],

[
"name" => "🎂 Alder",
"value" => $alder,
"inline" => true
],

[
"name" => "💬 Discord",
"value" => $discord
],

[
"name" => "🎮 Ingame Navn",
"value" => $ingame
],

[
"name" => "⭐ Hvorfor skal vi vælge dig",
"value" => $why
],

[
"name" => "🛠 Staff Erfaring",
"value" => $erfaring
],

[
"name" => "🔥 Motivation",
"value" => $motivation
],

[
"name" => "⏰ Timer pr uge",
"value" => $timer,
"inline" => true
]

],

"footer" => [
"text" => "Resident RP Staff System"
],

"timestamp" => date("c")

]

]

];

/* Send til Discord */

$ch = curl_init($webhookurl);

curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

/* Response */

if ($httpcode === 204) {

echo "success";

} else {

echo "error";

}

}

?>
