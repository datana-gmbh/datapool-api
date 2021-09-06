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

use Datana\Datapool\Api\Domain\Value\DatapoolId;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * @author Oskar Stark <oskar.stark@googlemail.de>
 */
interface AktenApiInterface
{
    public function getById(DatapoolId $datapoolId): ResponseInterface;

    public function getByAktenzeichen(string $aktenzeichen): ResponseInterface;

    /**
     * Diese Methode setzt "Ja" in KT beim Feld "Nutzer Mandantencockpit", das bedeutet
     * dass nur noch das Mandantencockpit für die Benachrichtigungen an den User zuständig ist.
     *
     * Andere Systeme wie KT, Formulario, VWV senden dann keine E-Mails oder SMS mehr an den Mandanten!
     */
    public function setValueNutzerMandantencockpit(DatapoolId $datapoolId, bool $value): bool;
}