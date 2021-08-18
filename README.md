# datapool-api

| Branch    | PHP                                         | Code Coverage                                        |
|-----------|---------------------------------------------|------------------------------------------------------|
| `master`  | [![PHP][build-status-master-php]][actions]  | [![Code Coverage][coverage-status-master]][codecov]  |

## Usage

### Setup
```php
use Datana\Datappol\Api\DatapoolClient;

$baseUri = 'https://....';
$username = '...';
$password = '...';

$client = new DatapoolClient($baseUri, $username, $password);

// you can now request any endpoint which needs authentication
$client->request('GET', '/something', $options);
```

### Create AktenEventLog
```php
use Datana\Datappol\Api\DatapoolClient;

$client = new DatappolClient(/* ... */);

$aktenEventLog = new AktenEventLog($client);
$aktenEventLog->log(
    '1234/12', // Aktenzeichen
    'E-Mail versendet', // Info-Text
    new \DateTimeImmutable(), // Zeitpunkt des Events
    'Mein Service', // Ersteller des Events
);
```

---

[build-status-master-php]: https://github.com/datana-gmbh/datapool-api/workflows/PHP/badge.svg?branch=master
[coverage-status-master]: https://codecov.io/gh/datana-gmbh/datapool-api/branch/master/graph/badge.svg

[actions]: https://github.com/datana-gmbh/datapool-api/actions
[codecov]: https://codecov.io/gh/datana-gmbh/datapool-api
