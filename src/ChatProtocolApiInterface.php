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

namespace Datana\Datapool\Api;

/**
 * @author Oskar Stark <oskar.stark@googlemail.de>
 */
interface ChatProtocolApiInterface
{
    /**
     * @param array<mixed>|null $context
     */
    public function save(string $aktenzeichen, string $conversationId, array $conversation, \DateTimeInterface $createdAt): bool;
}