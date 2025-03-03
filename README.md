# Template Cardless Cash Withdrawal

This is a simple template for Cardless Cash Withdrawal BRI API using PHP.

module:
- [Cardless Cash Withdrawal - Auth Token](https://developers.bri.co.id/en/docs/cardless-cash-withdrawal)
- [Cardless Cash Withdrawal - Cardless Withdrawal](https://developers.bri.co.id/en/docs/cardless-cash-withdrawal)
- [Cardless Cash Withdrawal - Cardless Reversal](https://developers.bri.co.id/en/docs/cardless-cash-withdrawal)

## List of Content
- [Instalasi](#instalasi)
  - [Prerequisites](#prerequisites)
  - [How to Setup Project](#how-to-setup-project)
  - [Auth Token](#auth-token)
  - [Cardless Withdrawal](#cardless-withdrawal)
  - [Validate Card Number](#validate-card-number)
- [Caution](#caution)
- [Disclaimer](#disclaimer)

## Instalasi

### Prerequisites
- php
- composer

### How to Setup Project

```bash
1. run command `cd briapi-template-cardless-cash-withdrawal-php` to change directory
```

### Auth Token
```bash
1. fill variable $providerId, eg: 'client_credentials'
2. fill variable $secretKey, eg: 'PXXQKV0HYVCJAsriOPQ6WSwK4S2lLi5Z'
3. run command `php src/auth_token.php serve`
```

### Cardless Withdrawal
```bash
1. fill variable $secretKey, eg: 'super_secret'
2. fill variable $clientId, eg: 'your_client_id'
3. run command `php src/cardless_withdrawal.php serve`
```

### Cardless Reversal
```bash
1. fill variable $secretKey, eg: 'super_secret'
2. fill variable $clientId, eg: 'your_client_id'
3. run command `php src/cardless_reversal.php serve`
```

## Caution

Please delete the .env file before pushing to github or bitbucket

## Disclaimer

Please note that this project is just a template on the use of BRI-API php sdk and may have bugs or errors.
