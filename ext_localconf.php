<?php
defined('TYPO3') || die();

(static function() {

    $icons = [
        'ext-w4organizationlist-wizard-icon' => [
            'name' => 'address-card'
        ],
        'ext-w4organizationlist-edit-icon' => [
            'name' => 'pencil-square-o'
        ],
        'ext-w4organizationlist-delete-icon' => [
            'name' => 'trash-o'
        ],
        'ext-w4organizationlist-phone-icon' => [
            'name' => 'phone'
        ],
        'ext-w4organizationlist-fax-icon' => [
            'name' => 'fax'
        ],

        // status icons for "Baugesuche"
        'filemetadata-status-1' => [
            'name' => 'check-circle'
        ],
        'filemetadata-status-2' => [
            'name' => 'times-circle' // declined/abgelehnt override instead of add 4th status with icon
        ],
        'filemetadata-status-3' => [
            'name' => 'exclamation-circle'
        ],
        'w4_organization_list-plugin-club' => [
            'name' => 'times-circle'
        ],
    ];

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Imaging\IconRegistry::class
    );

    foreach ($icons as $identifier => $icon) {

        $iconRegistry->registerIcon(
            $identifier,
            \TYPO3\CMS\Core\Imaging\IconProvider\FontawesomeIconProvider::class,
            $icon
        );

    }




    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'W4OrganizationList',
        'Club',
        [
            \W4Services\W4OrganizationList\Controller\OrganizationController::class => 'list, new, create, edit, update, delete, myList, redirectToList'
        ],
        // non-cacheable actions
        [
            \W4Services\W4OrganizationList\Controller\OrganizationController::class => 'create, update, delete, '
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    club {
                        iconIdentifier = ext-w4organizationlist-wizard-icon
                        title = LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4_organization_list_club.name
                        description = LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4_organization_list_club.description
                        tt_content_defValues {
                            CType = list
                            list_type = w4organizationlist_club
                        }
                    }
                }
                show = *
            }
       }'
    );
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][] = \W4Services\W4OrganizationList\Hooks\DataHandler::class . '->clearCachePostProc';

})();
