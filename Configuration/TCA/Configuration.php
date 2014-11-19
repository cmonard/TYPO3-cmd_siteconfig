<?php

if (!defined('TYPO3_MODE')) {
        die('Access denied.');
}

$GLOBALS['TCA']['tx_cmdsiteconfig_configuration'] = array(
    'ctrl' => $GLOBALS['TCA']['tx_cmdsiteconfig_configuration']['ctrl'],
    'interface' => array(
        'showRecordFieldList' => 'hidden, label, sites, confitem',
    ),
    'types' => array(
        '0' => array('showitem' => 'hidden;;1, label, sites, --div--;LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_configuration.tab.items, confitem'),
    ),
    'palettes' => array(
        '1' => array('showitem' => ''),
    ),
    'columns' => array(
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'label' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_configuration.label',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
            ),
        ),
        'sites' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_configuration.sites',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array('LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_configuration.sites.I.0', -1),
                    array('LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_configuration.sites.I.1', '--div--'),
                ),
                'exclusiveKeys' => '-1,',
                'foreign_table' => 'pages',
                'foreign_table_where' => 'AND pages.is_siteroot = 1 ORDER BY pages.sorting',
                'size' => 6,
                'autoSizeMax' => 20,
                'minitems' => 1,
                'maxitems' => 100,
            ),
        ),
        'confitem' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_configuration.confitem',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_cmdsiteconfig_confitem',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
                'foreign_sortby' => 'sorting',
                'foreign_unique' => 'constant',
                'appearance' => Array(
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                    'newRecordLinkAddTitle' => 1,
                    'levelLinksPosition' => 'both',
                    'useSortable' => 1,
                ),
            ),
        ),
    ),
);
