# datapool-api

| Branch    | PHP                                         | Code Coverage                                        |
|-----------|---------------------------------------------|------------------------------------------------------|
| `master`  | [![PHP][build-status-master-php]][actions]  | [![Code Coverage][coverage-status-master]][codecov]  |

## Usage

### Setup
```php
use Datana\Datapool\Api\DatapoolClient;

$baseUri = 'https://....';
$username = '...';
$password = '...';

$client = new DatapoolClient($baseUri, $username, $password);

// you can now request any endpoint which needs authentication
$client->request('GET', '/api/something', $options);
```

## Akten

In your code you should type-hint to `Datana\Datapool\Api\AktenApiInterface`

### Search by string (`string`)

```php
use Datana\Datapool\Api\AktenApi;
use Datana\Datapool\Api\DatapoolClient;

$client = new DatapoolClient(/* ... */);

$aktenApi = new AktenApi($client);
$response = $aktenApi->search('MySearchTerm');
```

### Get by Aktenzeichen (`string`)

```php
use Datana\Datapool\Api\AktenApi;
use Datana\Datapool\Api\DatapoolClient;
use Datana\Datapool\Api\Domain\Value\DatapoolId;

$client = new DatapoolClient(/* ... */);

$aktenApi = new AktenApi($client);
$response = $aktenApi->getByAktenzeichen('9zku4b-4524-4528-Winter');

/*
 * to get the DatapoolId transform the response to array
 * and use the 'id' key.
 */
$akte = $response->toArray();
$datapoolId = DatapoolId::fromInt($akte['id']);
```

### Get by ID (`Datana\Datapool\Api\Domain\Value\DatapoolId`)

```php
use Datana\Datapool\Api\AktenApi;
use Datana\Datapool\Api\DatapoolClient;
use Datana\Datapool\Api\Domain\Value\DatapoolId;

$client = new DatapoolClient(/* ... */);

$aktenApi = new AktenApi($client);

$id = DatapoolId::fromInt(123);

$aktenApi->getById($id);
```

### Get KT Akten Info (`Datana\Datapool\Api\Domain\Value\DatapoolId`)

```php
use Datana\Datapool\Api\AktenApi;
use Datana\Datapool\Api\DatapoolClient;
use Datana\Datapool\Api\Domain\Value\DatapoolId;

$client = new DatapoolClient(/* ... */);

$aktenApi = new AktenApi($client);

$id = DatapoolId::fromInt(123);

$aktenApi->getKtAktenInfo($id);
/*
 * Result:
 *   [
 *     'id' => 123,
 *     'url' => 'https://projects.knowledgetools.de/rema/?tab=akten&akte=4528',
 *     'instance' => 'rema',
 *     'group' => 'GARA',
 *   ]
 */
```

### Set value "Nutzer Mandantencockpit" (`bool`)

```php
use Datana\Datapool\Api\AktenApi;
use Datana\Datapool\Api\DatapoolClient;
use Datana\Datapool\Api\Domain\Value\DatapoolId;

$client = new DatapoolClient(/* ... */);

$aktenApi = new AktenApi($client);

$id = DatapoolId::fromInt(123);

$aktenApi->setValueNutzerMandantencockpit($id, true); // or false
```

## Aktenzeichen

In your code you should type-hint to `Datana\Datapool\Api\AktenzeichenApiInterface`

### Get a new one

```php
use Datana\Datapool\Api\AktenzeichenApi;
use Datana\Datapool\Api\DatapoolClient;

$client = new DatapoolClient(/* ... */);

$aktenzeichenApi = new AktenzeichenApi($client);
$aktenzeichenApi->new(); // returns sth like "6GU5DCB"
```

## AktenEventLog

In your code you should type-hint to `Datana\Datapool\Api\AktenEventLogInterface`

### Create a new log

```php
use Datana\Datapool\Api\AktenEventLog;
use Datana\Datapool\Api\DatapoolClient;

$client = new DatapoolClient(/* ... */);

$aktenEventLog = new AktenEventLog($client);
$aktenEventLog->log(
    '1234/12',                // Aktenzeichen
    'E-Mail versendet',       // Info-Text
    new \DateTimeImmutable(), // Zeitpunkt des Events
    'Mein Service',           // Ersteller des Events
);
```

[build-status-master-php]: https://github.com/datana-gmbh/datapool-api/workflows/PHP/badge.svg?branch=master
[coverage-status-master]: https://codecov.io/gh/datana-gmbh/datapool-api/branch/master/graph/badge.svg

[actions]: https://github.com/datana-gmbh/datapool-api/actions
[codecov]: https://codecov.io/gh/datana-gmbh/datapool-api
