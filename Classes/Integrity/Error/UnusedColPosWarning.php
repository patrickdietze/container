<?php

namespace B13\Container\Integrity\Error;

/*
 * This file is part of TYPO3 CMS-based extension "container" by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

use TYPO3\CMS\Core\Messaging\AbstractMessage;


class UnusedColPosWarning implements ErrorInterface
{
    /**
     * @var array
     */
    protected $childRecord = null;

    /**
     * @var array
     */
    protected $containerRecord = null;

    /**
     * @var string
     */
    protected $errorMessage = null;

    /**
     * @param array $childRecord
     * @param array $containerRecord
     */
    public function __construct(array $childRecord, array $containerRecord)
    {
        $this->childRecord = $childRecord;
        $this->containerRecord = $containerRecord;
        $this->errorMessage = 'container child with uid ' . $childRecord['uid']
            . ' on page ' . $childRecord['pid'] .
            ' has invlid colPos ' . $childRecord['colPos']
            . ' in container ' . $childRecord['tx_container_parent']
            . ' with CType ' . $containerRecord['CType'];

    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * @return int
     */
    public function getSeverity(): int
    {
        return AbstractMessage::ERROR;
    }

}
