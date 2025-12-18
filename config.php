<?php

const API_BASE_URL = 'https://www.themealdb.com/api/json/v1/';
const API_KEY      = '1';
$api_url = API_BASE_URL . API_KEY . '/';


function fetch_data($url) {
  // Inisialisasi cURL
  $ch = curl_init($url);

  // Atur opsi cURL
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  // Eksekusi
  $response = curl_exec($ch);

  return json_decode($response, true);
}