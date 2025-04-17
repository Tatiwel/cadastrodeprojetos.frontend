<?php
$api_base = "http://localhost:8000";

function api_get($endpoint) {
    global $api_base;
    return json_decode(file_get_contents($api_base . $endpoint), true);
}

function api_post($endpoint, $data) {
    global $api_base;
    $ch = curl_init($api_base . $endpoint);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    return json_decode(curl_exec($ch), true);
}

function api_put($endpoint, $data) {
    global $api_base;
    $ch = curl_init($api_base . $endpoint);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    return json_decode(curl_exec($ch), true);
}

function api_delete($endpoint) {
    global $api_base;
    $ch = curl_init($api_base . $endpoint);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    return json_decode(curl_exec($ch), true);
}
