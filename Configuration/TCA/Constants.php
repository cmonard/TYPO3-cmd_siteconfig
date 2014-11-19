<?php

if (!defined('TYPO3_MODE')) {
        die('Access denied.');
}

$GLOBALS['TCA']['tx_cmdsiteconfig_constants'] = array(
    'ctrl' => $GLOBALS['TCA']['tx_cmdsiteconfig_constants']['ctrl'],
    'interface' => array(
        'showRecordFieldList' => 'hidden, label, constant, consttype',
    ),
    'types' => array(
        '0' => array('showitem' => 'hidden;;1, label, constant, consttype'),
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
            'label' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_constants.label',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'constant' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_constants.constant',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'consttype' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_constants.consttype',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array('LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_constants.consttype.I.0', 'text'),
                    array('LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_constants.consttype.I.1', 'area'),
                    array('LLL:EXT:cmd_siteconfig/Resources/Private/Language/locallang_db.xlf:tx_cmdsiteconfig_constants.consttype.I.2', 'check'),
                ),
                'size' => 1,
                'maxItem' => 1,
            ),
        ),
    ),
);
