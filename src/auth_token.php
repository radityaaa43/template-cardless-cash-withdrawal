<?php

require 'utils.php';

// Enforce HTTPS with HSTS
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
header('Content-Type: application/json');

try {
  $providerId = filter_var('', FILTER_SANITIZE_STRING); // customer key
  $secretKey = filter_var('', FILTER_SANITIZE_STRING); // customer secret

  sanitizeInput([$providerId, $secretKey]);

  // url path values
  $baseUrl = 'https://api.briapidevstudio.dev.bbri.io/mock'; //base url

  $response = getAccessToken($providerId, $secretKey, $baseUrl);

  echo $response;
} catch (InvalidArgumentException $e) {
  error_log('Invalid argument: ' . $e->getMessage());

  http_response_code(400);
  echo json_encode(['error' => 'An error occurred. Please check your input.']);
} catch (RuntimeException $e) {
  error_log($e->getMessage());

  http_response_code(500);
  echo json_encode(['error' => 'An unexpected error occurred. Please contact support.']);

  exit(1);
}
