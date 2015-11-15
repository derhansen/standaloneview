<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'StandaloneView');

// Register Backend Module
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
	'Derhansen.' . $_EXTKEY,
	'web',
	'standaloneview_m1',
	'',
	array(
		'Backend' => 'index,multiple',
	),
	array(
		'access' => 'user,group',
		'icon'   => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/icon.gif',
		'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_backend.xlf',
	)
);