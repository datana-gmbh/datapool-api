<?php

declare(strict_types=1);

/**
 * This file is part of Datapool-Api.
 *
 * (c) Datana GmbH <info@datana.rocks>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Datana\Datapool\Api;

use Datana\Datapool\Api\Domain\Value\DatapoolId;
use Datana\Datapool\Api\Response\AktenResponse;
use Datana\Datapool\Api\Response\ETerminInfoResponse;
use Datana\Datapool\Api\Response\KtAktenInfoResponse;
use Datana\Datapool\Api\Response\SachstandResponse;
use Datana\Datapool\Api\Response\SimplyBookInfoResponse;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * @author Oskar Stark <oskar.stark@googlemail.de>
 */
interface KnowledgeToolsApiInterface
{
    /**
     * @return array{oid: int, instance: string, hash: string, value: mixed}
     */
    public function getFieldvalueByInstanceAndOid(string $instance, int $oid, string $fieldhash): array;
}
