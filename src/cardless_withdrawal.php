<?php

require 'utils.php';

// Enforce HTTPS with HSTS
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
$csp = "default-src 'self'; script-src 'self'; object-src 'none';";
header("Content-Security-Policy: $csp");

try {
  $clientId = '';

  // url path values
  $baseUrl = 'https://api.briapidevstudio.dev.bbri.io/mock'; //base url
  $providerId = ''; // customer key
  $secretKey = ''; // customer secret

  $validateInput = sanitizeInput([
    'clientId' => $clientId,
    'providerId' => $providerId,
    'secretKey' => $secretKey
  ]);

  $accessToken = getAccessToken($providerId, $secretKey, $baseUrl);

  $response = fetchCardlessWithDrawal(
    $baseUrl,
    $validateInput['clientId'],
    $validateInput['secretKey'],
    $accessToken
  );

  // Encode output to prevent XSS
  header('Content-Type: application/json');
  echo $response;
} catch (InvalidArgumentException $e) {
  error_log('Invalid argument: ' . $e->getMessage());
  echo json_encode(['error' => 'An error occurred. Please check your input.']);
} catch (RuntimeException $e) {
  error_log($e->getMessage());
  echo json_encode(['error' => 'An unexpected error occurred. Please contact support.']);

  exit(1);
}
