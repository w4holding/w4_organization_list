<?php

namespace W4Services\W4OrganizationList\Controller;

use TYPO3\CMS\Extbase\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;


use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use W4Services\W4OrganizationList\Domain\Repository\OrganizationRepository;

class AbstractController extends ActionController {

    /**
     * @var PersistenceManager
     */
    protected $persistenceManager;

    /**
     * @var FrontendUser
     */
    private static $loggedInFrontendUser = null;

    /**
     * @var FrontendUserRepository
     */
    private $frontendUserRepository;

    /**
     * @var OrganizationRepository
     * @inject
     */
    private $organizationRepository;

    public function initializeView( ViewInterface $view) {

        parent::initializeView( $view);

        $view->assignMultiple(
            [
                'content'   => $this->configurationManager->getContentObject()->data,
                'user'      => $this->getLoggedInFrontendUser()
            ]
        );

    }

    /**
     * Injects the repository
     *
     * @param \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager $persistenceManager
     */
    public function injectPersistenceManager( PersistenceManager $persistenceManager) {

        $this->persistenceManager = $persistenceManager;

    }

    /**
     * Injects the repository
     *
     * @param \W4Services\W4OrganizationList\Domain\Repository\OrganizationRepository $organizationRepository
     */
    public function injectOrganizationRepository( OrganizationRepository $organizationRepository) {

        $this->organizationRepository = $organizationRepository;

    }

    /**
     * Injects the repository
     *
     * @param \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository $frontendUserRepository
     */
    public function injectFrontendUserRepository( FrontendUserRepository $frontendUserRepository) {

        $this->frontendUserRepository = $frontendUserRepository;

    }

    /**
     * @return PersistenceManager
     */
    public function getPersistenceManager(): PersistenceManager
    {
        return $this->persistenceManager;
    }

    /**
     * @return FrontendUserRepository
     */
    protected function getFrontendUserRepository() : FrontendUserRepository {

        return $this->frontendUserRepository;

    }

    /**
     * @return OrganizationRepository
     */
    protected function getOrganizationRepository() : OrganizationRepository {

        return $this->organizationRepository;

    }

    /**
     * @return ObjectManager;
     */
    protected function getObjectManager() : ObjectManager {

        return $this->objectManager;

    }

    protected function getLoggedInFrontendUser() {

        if( is_null( self::$loggedInFrontendUser)) {

            self::$loggedInFrontendUser = !!$GLOBALS['TSFE']->fe_user
                ? $this->getFrontendUserRepository()->findByUid(
                    $GLOBALS['TSFE']->fe_user->user[ 'uid']
                )
                : FALSE;

        }

        return self::$loggedInFrontendUser;

    }

    protected function translate( ...$arguments) {

        return LocalizationUtility::translate(
            array_shift(
                $arguments
            ),
            $this->getControllerContext()
                ->getRequest()
                ->getControllerExtensionName(),
            $arguments
        );

    }

    protected function isPostRequest() {

        return preg_match(
            '/^post$/i',
            filter_input(
                INPUT_SERVER,
                'REQUEST_METHOD',
                FILTER_SANITIZE_STRING
            )
        );


    }

    protected function getLoginPageID() {

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
        
        $row = $queryBuilder->select('pid')
           ->from('tt_content')
           ->where($queryBuilder->expr()->eq('CType', $queryBuilder->createNamedParameter('login')))
           ->setMaxResults(1);
      

           $row = $queryBuilder->execute()->fetchAll();


 



            return $row
                ? $row[ 'pid']
                : -1;

    }

    /**
     * @return \TYPO3\CMS\Core\Database\DatabaseConnection
     */
    protected function getDatabaseConnection() {

        return $GLOBALS['TYPO3_DB'];

    }

    /**
     * @return TypoScriptFrontendController
     */
    protected function getTypoScriptFrontendController() {

        return $GLOBALS['TSFE'];

    }

    protected function redirectToUri( $url, $delay = null, $statusCode = 303): void {

        header(
            sprintf(
                'Location: %s',
                $url
            ),
            TRUE,
            $statusCode ?: 301
        );

        die();

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


}
