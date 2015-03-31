<?php

namespace CMD\CmdSiteconfig;

if (!defined('TYPO3_MODE')) {
        die('Access denied.');
}

class Api implements \TYPO3\CMS\Core\SingletonInterface {

        protected $triggerUpdate = FALSE;

        static public function getTCATypeArray() {
                $return = array();

                // we search for constant configurations
                $PageRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Frontend\\Page\\PageRepository');
                $rows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*', 'tx_cmdsiteconfig_constants', '1' . $PageRepository->deleteClause('tx_cmdsiteconfig_constants'));

                // we insert every type selector
                if ($rows) {
                        foreach ($rows as $row) {
                                $return[$row['uid']] = array('showitem' => 'hidden;;1, constant, --palette--;;' . $row['consttype']);
                        }
                }

                // we return the array
                return $return;
        }

        static public function getTSConstants() {
                $return = '';

                // we search for constant configurations
                $PageRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Frontend\\Page\\PageRepository');
                $confs = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*', 'tx_cmdsiteconfig_configuration', '1' . $PageRepository->enableFields('tx_cmdsiteconfig_configuration'), '', 'sorting');

                // if we have some configuration we create the typoscript code
                if ($confs) {
                        $fields = 'tx_cmdsiteconfig_confitem.*, tx_cmdsiteconfig_constants.constant, tx_cmdsiteconfig_constants.consttype';
                        $table = 'tx_cmdsiteconfig_confitem LEFT JOIN tx_cmdsiteconfig_constants ON (tx_cmdsiteconfig_constants.uid = tx_cmdsiteconfig_confitem.constant)';
                        $where = '1' . $PageRepository->enableFields('tx_cmdsiteconfig_confitem') . ' AND tx_cmdsiteconfig_confitem.parenttable LIKE "tx_cmdsiteconfig_configuration"';
                        $where.= $PageRepository->enableFields('tx_cmdsiteconfig_constants');
                        foreach ($confs as $conf) {
                                $return.= LF . '### Configuration for "' . $conf['label'] . '" BEGIN:' . LF;
                                // we add condition for sites
                                if ($conf['sites'] != '-1') {
                                        $return.= '[PIDinRootline = ' . $GLOBALS['TYPO3_DB']->cleanIntList($conf['sites']) . ']' . LF;
                                }

                                // we search for constant to configure
                                $rows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($fields, $table, $where . ' AND tx_cmdsiteconfig_confitem.parentid = ' . $conf['uid'], '', 'sorting');
                                if ($rows) {
                                        foreach ($rows as $constant) {
                                                $return.= $constant['constant'] . ' ';
                                                switch ($constant['consttype']) {
                                                        case 'text':
                                                                $return.= '= ' . $constant['value_text'];
                                                                break;
                                                        case 'area':
                                                                $return.= '(' . LF;
                                                                $return.= trim($constant['value_area']) . LF;
                                                                $return.= ')';
                                                                break;
                                                        case 'check':
                                                                $return.= '= ' . $constant['value_check'];
                                                                break;
                                                }
                                                $return.= LF;
                                        }
                                }

                                // comment: end of configuration
                                $return.= '### Configuration for "' . $conf['label'] . '" END' . LF . LF;
                        }
                        $return.= '[GLOBAL]' . LF;
                }

                // we return the string
                return $return;
        }

        // we cannot clear the cache during the database storing so we need to delai the action
        public function processDatamap_afterDatabaseOperations($status, $table, $id, $fieldArray, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {
                if ($table == 'tx_cmdsiteconfig_configuration') {
                        $this->triggerUpdate = TRUE;
                }
        }

        public function processDatamap_afterAllOperations(\TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {
                if ($this->triggerUpdate) {
                        $pObj->clear_cacheCmd('system');
                        $pObj->clear_cacheCmd('pages');
                }
        }

}
