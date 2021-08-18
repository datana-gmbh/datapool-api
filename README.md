# datapool-api

| Branch    | PHP                                         | Code Coverage                                        |
|-----------|---------------------------------------------|------------------------------------------------------|
| `master`  | [![PHP][build-status-master-php]][actions]  | [![Code Coverage][coverage-status-master]][codecov]  |
| `develop` | [![PHP][build-status-develop-php]][actions] | [![Code Coverage][coverage-status-develop]][codecov] |

## Usage

### Setup
```php
use Datana\Datappol\Api\DatapoolClient;

$baseUri = 'https://....';
$username = '...';
$password = '...';

$client = new DatappolClient($baseUri, $username, $password);

// you can now request any endpoint which needs authentication
$client->request($method, $url, $options);
```

---

[build-status-develop-php]: https://github.com/datana-gmbh/datapool-api/workflows/PHP/badge.svg?branch=develop
[build-status-master-php]: https://github.com/datana-gmbh/datapool-api/workflows/PHP/badge.svg?branch=master
[coverage-status-develop]: https://codecov.io/gh/datana-gmbh/datapool-api/branch/develop/graph/badge.svg
[coverage-status-master]: https://codecov.io/gh/datana-gmbh/datapool-api/branch/master/graph/badge.svg

[actions]: https://github.com/datana-gmbh/datapool-api/actions
[codecov]: https://codecov.io/gh/datana-gmbh/datapool-api
