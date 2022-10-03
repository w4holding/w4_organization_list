<?php

declare(strict_types=1);

namespace W4Services\W4OrganizationList\Controller;

use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository;

use W4Services\W4OrganizationList\Domain\Model\Organization;

/**
 * This file is part of the "Organization list" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * OrganizationController
 */
class OrganizationController extends AbstractController
{
    const MESSAGE_FORBIDDEN_TITLE = 'forbidden.title';

    const MESSAGE_FORBIDDEN_DESCRIPTION = 'forbidden.description';

    const MESSAGE_SUCCESSFULLY_SAVED_TITLE = 'successfully.title';

    const MESSAGE_SUCCESSFULLY_SAVED_DESCRIPTION = 'successfully.description';

    const MESSAGE_SUCCESSFULLY_DELETED_TITLE = 'deleted.title';

    const MESSAGE_SUCCESSFULLY_DELETED_DESCRIPTION = 'deleted.description';

    const CACHE_TAG = 'tx_w4organizationlist';

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $this->getTypoScriptFrontendController()->addCacheTags([static::CACHE_TAG]);

        $records = $this->getOrganizationRepository()->findAll();

        // add storage pid ids to cache tag
        $this->getTypoScriptFrontendController()->addCacheTags(
            array_map(
                function( $pid) {
                    return static::CACHE_TAG.'_PID_'.$pid;
                },
                $this->getStoragePids()
            )
        );

        // get categories for Clubs/Industries
        $categoryRepository = $this->getObjectManager()->get(CategoryRepository::class);

        $data = $this->configurationManager->getContentObject()->data;
        $storagePid = $data['pages'];
        $categories = $categoryRepository->findByPid($storagePid);

        $this->view->assignMultiple([
            'records' => $records,
            'categories' => $categories
        ]);
        return $this->htmlResponse();
    }


    /**
     * action myList
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function myListAction(): \Psr\Http\Message\ResponseInterface
    {
        
        $this->getTypoScriptFrontendController()->addCacheTags([static::CACHE_TAG]);

        $feUserId = $this->getLoggedInFrontendUser()
            ? $this->getLoggedInFrontendUser()->getUid()
            : -1;
            
        $records = $this->getOrganizationRepository()->findByFeCruser($feUserId);
        $this->getTypoScriptFrontendController()->addCacheTags(
            [
                static::CACHE_TAG.'_FE_USER_'.$feUserId
            ]
        );        

        foreach ($records as $record) {
            $this->getTypoScriptFrontendController()->addCacheTags(
                [
                    static::CACHE_TAG.'_UID_'.$record->getUid()
                ]
            );
        }

        // get categories for Clubs/Industries
        $categoryRepository = $this->getObjectManager()->get(CategoryRepository::class);

        $data = $this->configurationManager->getContentObject()->data;

        $this->view->assignMultiple([
            'records' => $records,
            'categories' => $categoryRepository->findByPid(
                $data['pages']
            ),
            'feUserId' => $feUserId,
            'header' => $data['header']
        ]);
        return $this->htmlResponse();
    }


    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        if( !$this->getLoggedInFrontendUser()) {
            return $this->redirectToLoginPage();
        }

        $this->view->assignMultiple(
            [
                'record' => GeneralUtility::makeInstance(
                    Organization::class
                )
            ]
        );

        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \W4Services\W4OrganizationList\Domain\Model\Organization $record
     */
    public function createAction(\W4Services\W4OrganizationList\Domain\Model\Organization $record)
    {
        if( !$this->getLoggedInFrontendUser()) {
            return $this->redirectToLoginPage();
        }

        $record->setFeCruser(
            $this->getLoggedInFrontendUser()
        );

        $this->getOrganizationRepository()->add( $record);

        $this->clearCacheFor(
            $this->getLoggedInFrontendUser()->getUid()
        );
        
        $this->redirectToPid( $this->getRedirectPageOrDefault() );

    }

    /**
     * action edit
     *
     * @param \W4Services\W4OrganizationList\Domain\Model\Organization $organization
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("organization")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\W4Services\W4OrganizationList\Domain\Model\Organization $record): \Psr\Http\Message\ResponseInterface
    {

        if ( !$this->getLoggedInFrontendUser()
           || $record->getFeCruser()->getUid() !== $this->getLoggedInFrontendUser()->getUid()
        ) {
            return $this->redirectToLoginPage();
        }

        $this->view->assignMultiple([
            'record' => $record
        ]);

        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \W4Services\W4OrganizationList\Domain\Model\Organization $organization
     */
    public function updateAction(\W4Services\W4OrganizationList\Domain\Model\Organization $record)
    {

        if ( !$this->getLoggedInFrontendUser()
            || $record->getFeCruser()->getUid() !== $this->getLoggedInFrontendUser()->getUid()
        ) {
            return $this->redirectToLoginPage();
        }

        $this->getOrganizationRepository()->update($record);

        $this->clearCacheFor(
            $this->getLoggedInFrontendUser()->getUid(),
            $record->getUid()
        );

        $this->redirectToPid( $this->getRedirectPageOrDefault() );
    }

    /**
     * action delete
     *
     * @param \W4Services\W4OrganizationList\Domain\Model\Organization $record
     */
    public function deleteAction(\W4Services\W4OrganizationList\Domain\Model\Organization $record)
    {
        if(  !$this->getLoggedInFrontendUser()
           || $record->getFeCruser()->getUid() !== $this->getLoggedInFrontendUser()->getUid()) {

            return $this->redirectToLoginPage();

        }

        $this->getOrganizationRepository()->remove($record);

        $this->addFlashMessage(
            $this->translate( self::MESSAGE_SUCCESSFULLY_DELETED_DESCRIPTION),
            $this->translate( self::MESSAGE_SUCCESSFULLY_DELETED_TITLE),
            \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR,
            TRUE
        );

        $this->clearCacheFor(
            $this->getLoggedInFrontendUser()->getUid(),
            $record->getUid()
        );

        $this->redirectToPid( $this->getRedirectPageOrDefault() );
    }


    /**
     * action redirectToList
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function redirectToListAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }
    protected function redirectToLoginPage() {

        $this->addFlashMessage(
            $this->translate( self::MESSAGE_FORBIDDEN_DESCRIPTION),
            $this->translate( self::MESSAGE_FORBIDDEN_TITLE),
            \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR,
            TRUE
        );

        return $this->redirectToUri(
            $this->uriBuilder->reset()
                ->setTargetPageUid(
                    $this->getLoginPageID()
                )
                ->setCreateAbsoluteUri(TRUE)
                ->build()
        );

    }

    protected function redirectToPid($pageUid) {

        $this->getPersistenceManager()->persistAll();

        $uriBuilder = $this->uriBuilder;
        $uri = $uriBuilder
            ->setTargetPageUid($pageUid)
            ->build();
        $this->redirectToURI($uri, $delay=0, $statusCode=303);
    }

    protected function getStoragePids() {

        $data = $this->configurationManager->getContentObject()->data;

        $pages = array_key_exists( 'pages', $data)
            ? $data[ 'pages']
            : '';

        return explode(
            ',',
            $pages
        );

    }

    protected function clearCacheFor( $feUserId, $recordUid = null) {

        $tags = array_merge(
            [
                static::CACHE_TAG.'_FE_USER_'.$feUserId
            ],
            array_map(
                function( $pid) {
                    return static::CACHE_TAG.'_PID_'.$pid;
                },
                $this->getStoragePids()
            )
        );

        if( !!$recordUid) {
            $tags[] = static::CACHE_TAG.'_UID_'.$recordUid;
        }

        /**
         * clear caches by tags
         */
        GeneralUtility::makeInstance(
            CacheManager::class
        )->flushCachesByTags(
            $tags
        );

    }

    private function getRedirectPageOrDefault() {

        return intval(
            $this->settings['redirectPid']
                    ?: $this->settings['defaultRedirectPage']
        );

    }
}
