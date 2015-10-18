<?php
namespace Derhansen\Standaloneview\Service;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/**
 * StandaloneViewService
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class StandaloneViewService {

	/**
	 * The object manager
	 *
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 * @inject
	 */
	protected $objectManager;

	/**
	 * The configuration manager
	 *
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
	 * @inject
	 */
	protected $configurationManager;

	/**
	 * Renders a Fluid StandaloneView respecting the given language
	 *
	 * @param string $language The language (e.g. de, dk or se)
	 * @return string
	 * @throws \TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException
	 */
	public function renderStandaloneView($language = '') {

		if ($language !== '') {
			// Temporary set Language of current BE user to given language
			$GLOBALS['BE_USER']->uc['lang'] = $language;
		}

		/** @var \TYPO3\CMS\Fluid\View\StandaloneView $view */
		$view = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
		$view->setFormat('html');
		$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
		$templateRootPath = GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['plugin.']['tx_standaloneview.']['view.']['templateRootPath']);
		$view->setTemplatePathAndFilename($templateRootPath . 'StandaloneView.html');

		// Set Extension name, so localizations for extension get respected
		$extensionKey = 'standaloneview';
		$view->getRequest()->setControllerExtensionName(GeneralUtility::underscoredToUpperCamelCase($extensionKey));

		return $view->render();
	}

}