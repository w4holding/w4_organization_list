<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_w4organizationlist_domain_model_organization', 'EXT:w4_organization_list/Resources/Private/Language/locallang_csh_tx_w4organizationlist_domain_model_organization.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_w4organizationlist_domain_model_organization');






    \HDNET\Autoloader\Loader::extTables(
        'W4Services',
        'w4_organization_list',
        [
            //'Hooks',
            'Slots',
            'SmartObjects',
            'FlexForms',
            'CommandController',
            'StaticTyposcript',
            'ExtensionId',
            'ContextSensitiveHelps',
            'TypeConverter'
        ]
    );



})();
