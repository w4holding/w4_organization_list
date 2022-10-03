<?php
defined('TYPO3_MODE') or die();

/**
 * @SEE original here: web/typo3/sysext/filemetadata/Configuration/TCA/Overrides/sys_file_metadata.php
 */

// for now, we are overriding the 2. system status instead of adding a 4th one.
// @SEE web/typo3conf/ext/w4_organization_list/ext_localconf.php
$tca = [
    'columns' => [
        'status' => [
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                // add new status
                'items' =>
                    // change existing
                    [
                        [
                            'LLL:EXT:filemetadata/Resources/Private/Language/locallang_tca.xlf:sys_file_metadata.status.1',
                            1,
                            'filemetadata-status-1'
                        ],
                        [
                            'LLL:EXT:w4_organization_list/Resources/Private/Language/de.locallang_tca.xlf:sys_file_metadata.status.4',
                            2,
                            'filemetadata-status-2'
                        ],
                        [
                            'LLL:EXT:filemetadata/Resources/Private/Language/locallang_tca.xlf:sys_file_metadata.status.3',
                            3,
                            'filemetadata-status-3'
                        ],
                    ]
                    // add new
                    /*array_merge(
                        $GLOBALS['TCA']['sys_file_metadata']['columns']['status']['config']['items'],
                        [
                            [
                                'LLL:EXT:w4_organization_list/Resources/Private/Language/de.locallang_tca.xlf:sys_file_metadata.status.4',
                                4,
                                'filemetadata-status-4'
                            ],
                        ]
                    ),*/
            ],
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($GLOBALS['TCA']['sys_file_metadata'], $tca);
