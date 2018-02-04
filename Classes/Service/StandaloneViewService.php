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

use Derhansen\Standaloneview\Utility\LocalizationUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * StandaloneViewService
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class StandaloneViewService
{
    /**
     * The object manager
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     * */
    protected $objectManager;

    /**
     * The configuration manager
     *
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
     * */
    protected $configurationManager;

    /**
     * @param \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager
     */
    public function injectObjectManager(\TYPO3\CMS\Extbase\Object\ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManager $configurationManager
     */
    public function injectConfigurationManager(
        \TYPO3\CMS\Extbase\Configuration\ConfigurationManager $configurationManager
    ) {
        $this->configurationManager = $configurationManager;
    }

    /**
     * Renders a Fluid StandaloneView respecting the given language
     *
     * @param string $language The language (e.g. de, dk or se)
     * @return string
     */
    public function renderStandaloneView($language = '')
    {
        // Set the extensionKey
        $extensionKey = GeneralUtility::underscoredToUpperCamelCase('standaloneview');

        if ($language !== '') {
            // Temporary set Language of current BE user to given language
            $GLOBALS['BE_USER']->uc['lang'] = $language;
            LocalizationUtility::resetLocalizationCache($extensionKey);
        }

        /** @var \TYPO3\CMS\Fluid\View\StandaloneView $view */
        $view = $this->objectManager->get(StandaloneView::class);
        $view->setFormat('html');
        $template = GeneralUtility::getFileAbsFileName(
            'EXT:standaloneview/Resources/Private/Templates/StandaloneView.html'
        );
        $view->setTemplatePathAndFilename($template);

        // Set Extension name, so localizations for extension get respected
        $view->getRequest()->setControllerExtensionName($extensionKey);

        return $view->render();
    }
}
