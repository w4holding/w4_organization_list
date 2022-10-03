<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,description,link,email,name,street,zip,city,tx_w4organizationlist_function,mobile,phone,checkbox_delete',
        'iconfile' => 'EXT:w4_organization_list/Resources/Public/Icons/tx_w4organizationlist_domain_model_organization.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'title, description, link, email, name, street, zip, city, tx_w4organizationlist_function, mobile, phone, checkbox_delete, images, fe_cruser, categories, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_w4organizationlist_domain_model_organization',
                'foreign_table_where' => 'AND {#tx_w4organizationlist_domain_model_organization}.{#pid}=###CURRENT_PID### AND {#tx_w4organizationlist_domain_model_organization}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'categories' => [
            'config'=> [
                'type' => 'category',
            ],
        ],

        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            
        ],
        'link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.link',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'nospace,email',
                'default' => ''
            ]
        ],
        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'street' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.street',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'zip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.zip',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'tx_w4organizationlist_function' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.tx_w4organizationlist_function',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'mobile' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.mobile',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'phone' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.phone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'checkbox_delete' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.checkbox_delete',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'images' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.images',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'images',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'images',
                        'tablenames' => 'tx_w4organizationlist_domain_model_organization',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
            
        ],
        'fe_cruser' => [
            'exclude' => true,
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.fe_cruser',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'fe_users',
                'default' => 0,
                'minitems' => 0,
                'maxitems' => 1,
            ],

        ], 
        'categories' => [
            'config' => [
                'foreign_table' => 'sys_category',
                'foreign_table_where' => 'AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.sorting ASC',
                'maxitems' => '9999',
                'MM' => 'sys_category_record_mm',
                'MM_match_fields' => [
                    'fieldname' => 'categories',
                    'tablenames' => 'tx_w4organizationlist_domain_model_organization',
                ],
                'MM_opposite_field' => 'items',
                'renderType' => 'selectTree',
                'size' => '20',
                'treeConfig' => [
                    'appearance' => [
                        'expandAll' => '1',
                        'maxLevels' => '99',
                        'showHeader' => '1',
                    ],
                    'parentField' => 'parent',
                ],
                'type' => 'select',
            ],
            'exclude' => '1',
            'label' => 'LLL:EXT:w4_organization_list/Resources/Private/Language/locallang_db.xlf:tx_w4organizationlist_domain_model_organization.categories'
        ]  
    ],
];
