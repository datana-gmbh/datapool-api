<?php

declare(strict_types=1);

/*
 * This file is part of Datapool-Api.
 *
 * (c) Datana GmbH <info@datana.rocks>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Datana\Datatpool\Api;

use Datana\Datapool\Api\AktenEventLogApiInterface;
use Datana\Datapool\Api\DatapoolClient;
use OskarStark\Value\TrimmedNonEmptyString;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class AktenEventLogApi implements AktenEventLogApiInterface
{
    private DatapoolClient $client;
    private LoggerInterface $logger;

    public function __construct(DatapoolClient $client, ?LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger ?? new NullLogger();
    }

    public function log(string $aktenzeichen, string $info, \DateTimeInterface $timestamp, string $creator, ?string $text = null, ?string $html = null, ?array $context = null, ?string $foreignId = null, ?string $foreignType = null): bool
    {
        $values = [
            'aktenzeichen' => TrimmedNonEmptyString::fromString($aktenzeichen)->toString(),
            'info' => TrimmedNonEmptyString::fromString($info)->toString(),
            'timestamp' => $timestamp->format('Y-m-d H:i:s'),
            'creator' => TrimmedNonEmptyString::fromString($creator)->toString(),
        ];

        if (null !== $text) {
            $values['text'] = TrimmedNonEmptyString::fromString($text)->toString();
        }

        if (null !== $html) {
            $values['html'] = TrimmedNonEmptyString::fromString($html)->toString();
        }

        if (null !== $context) {
            $values['context'] = $context;
        }

        if (null !== $foreignId) {
            $values['foreignId'] = TrimmedNonEmptyString::fromString($foreignId)->toString();
        }

        if (null !== $foreignType) {
            $values['foreignType'] = TrimmedNonEmptyString::fromString($foreignType)->toString();
        }

        $this->logger->debug('Log to AktenEventLog', $values);

        try {
            $response = $this->client->request(
                'POST',
                '/api/event-log',
                [
                    'json' => $values,
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                ],
            );

            $this->logger->debug('Response', $response->toArray(false));

            if (!\in_array($response->getStatusCode(), [200, 201], true)) {
                return false;
            }

            return true;
        } catch (\Throwable $e) {
            $this->logger->error($e->getMessage());

            throw $e;
        }
    }
}
