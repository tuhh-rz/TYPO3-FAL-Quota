<?php
declare(strict_types=1);
namespace Mehrwert\FalQuota\EventListener;

/*
 * 2023 - EXT:fal_quota -FAL Quota
 *
 * This file is subject to the terms and conditions defined in
 * file 'LICENSE.md', which is part of this source code package.
 */

use Mehrwert\FalQuota\Handler\QuotaHandler;
use TYPO3\CMS\Core\Resource\Event\AfterFolderMovedEvent;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Set the storage size after a file was added
 */
class SetQuotaAfterFolderMoved
{
    public function __invoke(AfterFolderMovedEvent $event): void
    {
        /** @var QuotaHandler $handler */
        $handler = GeneralUtility::makeInstance(QuotaHandler::class);
        $handler->updateQuotaByFolder($event->getFolder());
        $handler->updateQuotaByFolder($event->getTargetFolder());
    }
}

