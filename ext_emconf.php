<?php
/***************************************************************
 * Extension Manager/Repository config file for ext "cmd_siteconfig".
 *
 * Auto generated 18-11-2014 09:26
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
        'title' => 'CMD Site Configuration',
        'description' => 'Make creation of typoscript constants on the fly for web root by creating records',
        'category' => 'be',
        'shy' => 1,
        'version' => '0.1.0',
        'dependencies' => '',
        'conflicts' => '',
        'priority' => '',
        'loadOrder' => '',
        'module' => '',
        'state' => 'beta',
        'uploadfolder' => 0,
        'createDirs' => '',
        'modify_tables' => '',
        'clearcacheonload' => 1,
        'lockType' => '',
        'author' => 'Christophe Monard',
        'author_email' => 'contact@cmonard.fr',
        'author_company' => '',
        'CGLcompliance' => '',
        'CGLcompliance_note' => '',
        'constraints' => array(
                'depends' => array(
			'typo3' => '6.0.0-6.2.99',
			'php' => '5.3.7-0.0.0',
			'cms' => '',
                ),
                'conflicts' => array(
                ),
                'suggests' => array(
                ),
        ),
);
?>