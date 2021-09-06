<?php

declare(strict_types=1);

namespace Datana\Datapool\Api\Bridge\Faker;

use Datana\Datapool\Api\Domain\Value\DatapoolId;
use Faker\Provider\Base as BaseProvider;

final class DatapoolIdProvider extends BaseProvider
{
    public function datapoolId(): DatapoolId
    {
        return DatapoolId::fromInt(
            $this->datapoolIdInteger()
        );
    }

    public function datapoolIdInteger(): int
    {
        return $this->generator->numberBetween(1);
    }
}
