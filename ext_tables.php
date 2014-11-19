<?php

if (!defined('TYPO3_MODE')) {
        die('Access denied.');
}

$GLOBALS['TCA']['tx_cmdsiteconfig_configuration'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_configuration',
        'label' => 'label',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => 1,
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
        ),
        'searchFields' => 'label,',
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Configuration.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_cmdsiteconfig_configuration.png',
    ),
);

$GLOBALS['TCA']['tx_cmdsiteconfig_confitem'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_confitem',
        'label' => 'constant',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'type' => 'constant',
        'hideTable' => TRUE,
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/ConfItem.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_cmdsiteconfig_confitem.png',
    ),
);

$GLOBALS['TCA']['tx_cmdsiteconfig_constants'] = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_constants',
        'label' => 'label',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY label',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
        ),
        'searchFields' => 'label,constant,',
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Constants.php',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_cmdsiteconfig_constants.png',
    ),
);

$constants = \CMD\CmdSiteconfig\Api::getTSConstants();
if ($constants != '') {
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript($_EXTKEY, 'constants', $constants, 43);
}
