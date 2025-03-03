<?php

use BRI\CardlessCashWithdrawal\AuthToken;
use BRI\CardlessCashWithdrawal\CardlessReversal;
use BRI\CardlessCashWithdrawal\CardlessWithdrawal;
use BRI\Util\ExecuteCurlRequest;
use BRI\Util\PrepareRequest;

require __DIR__ . '/../../briapi-sdk/autoload.php';

function getAccessToken(string $providerId, string $secretKey, string $baseUrl): string {
  $getToken = (new AuthToken())->authToken(
    $baseUrl,
    $providerId,
    $secretKey
  );

  $data = json_decode($getToken, true);

  // Validate the decoded data
  if (!is_array($data) || empty($data['access_token'])) {
    throw new Exception('Failed to retrieve access token.');
  }

  $accessToken = $data['access_token'];

  return $accessToken;
}

function sanitizeInput(array $inputs): array {
  $sanitized = [];
  foreach ($inputs as $key => $value) {
    $sanitized[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    if (empty($sanitized[$key])) {
        throw new Exception("Invalid input parameter for $key");
    }
  }
  return $sanitized;
}

function fetchCardlessReversal(
  string $baseUrl,
  string $clientId,
  string $secretKey,
  string $accessToken
  ): string {
  $executeCurlRequest = new ExecuteCurlRequest();
  $prepareRequest = new PrepareRequest();

  $cardlessReversal = new CardlessReversal(
    $executeCurlRequest,
    $prepareRequest
  );

  $response = $cardlessReversal->cardlessReversal(
    $baseUrl,
    $clientId,
    $secretKey,
    $accessToken
  );

  if (!is_string($response)) {
    throw new Exception('Invalid response received.');
  }

  return $response;
}

function fetchCardlessWithDrawal(
  string $baseUrl,
  string $clientId,
  string $secretKey,
  string $accessToken
) {
  $executeCurlRequest = new ExecuteCurlRequest();
  $prepareRequest = new PrepareRequest();

  $cardlessWithDrawal = new CardlessWithdrawal(
    $executeCurlRequest,
    $prepareRequest
  );

  $response = $cardlessWithDrawal->cardlessWithdrawal(
    $baseUrl,
    $clientId,
    $secretKey,
    $accessToken
  );

  return $response;
}
