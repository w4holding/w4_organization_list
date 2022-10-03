<?php

namespace W4Services\W4OrganizationList\Hooks;

use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;

use W4Services\W4OrganizationList\Controller\OrganizationController;

class DataHandler {

    /**
     * Flushes the cache if a news record was edited.
     * This happens on two levels: by UID and by PID.
     *
     * @param array $params
     * @return void
     */
    public function clearCachePostProc(array $params) {

        if (isset($params['table']) && $params['table'] === 'tx_w4organizationlist_domain_model_organization') {

            $cacheTagsToFlush = [];

            if (isset($params['uid'])) {

                $cacheTagsToFlush[] = OrganizationController::CACHE_TAG.'_pid_' . $params['uid'];

            }

            if (isset($params['uid_page'])) {

                $cacheTagsToFlush[] = OrganizationController::CACHE_TAG.'_pid_' . $params['uid_page'];

            }

            $cacheManager = GeneralUtility::makeInstance(CacheManager::class);

            foreach ($cacheTagsToFlush as $cacheTag) {

                $cacheManager->flushCachesInGroupByTag('pages', $cacheTag);

            }

        }

    }

}
