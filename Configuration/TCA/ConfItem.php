<?php

if (!defined('TYPO3_MODE')) {
        die('Access denied.');
}

$GLOBALS['TCA']['tx_cmdsiteconfig_confitem'] = array(
    'ctrl' => $GLOBALS['TCA']['tx_cmdsiteconfig_confitem']['ctrl'],
    'interface' => array(
        'showRecordFieldList' => 'hidden, constant, value_text, value_area, value_check',
    ),
    'types' => CMD\CmdSiteconfig\Api::getTCATypeArray(),
    'palettes' => array(
        'text' => array('showitem' => 'value_text', 'canNotCollapse' => 1),
        'area' => array('showitem' => 'value_area', 'canNotCollapse' => 1),
        'check' => array('showitem' => 'value_check', 'canNotCollapse' => 1),
    ),
    'columns' => array(
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'constant' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_confitem.constant',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array('', 0),
                ),
                'foreign_table' => 'tx_cmdsiteconfig_constants',
                'foreign_table_where' => 'AND tx_cmdsiteconfig_constants.deleted = 0 ORDER BY tx_cmdsiteconfig_constants.label',
                'size' => 1,
                'minItem' => 1,
                'maxItem' => 1,
            ),
        ),
        'value_text' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_confitem.value_text',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'value_area' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_confitem.value_area',
            'config' => array(
                'type' => 'text',
                'cols' => 40,
                'rows ' => 5,
            ),
        ),
        'value_check' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_confitem.value_check',
            'config' => array(
                'type' => 'check',
            ),
        ),
    ),
);
