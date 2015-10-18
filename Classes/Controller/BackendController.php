<?php
namespace Derhansen\Standaloneview\Controller;

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
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * BackendController
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class BackendController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \Derhansen\Standaloneview\Service\StandaloneViewService
	 * @inject
	 */
	protected $standaloneViewService;

	/**
	 * @param array $formdata
	 */
	public function indexAction($formdata = NULL) {
		$languages = array(
			'' => 'Default',
			'de' => 'Deutsch',
			'dk' => 'Dansk'
		);

		$language = '';
		if (isset($formdata['language'])) {
			$language = $formdata['language'];
		}

		$result = $this->standaloneViewService->renderStandaloneView($language);
		$this->view->assign('formdata', $formdata);
		$this->view->assign('languages', $languages);
		$this->view->assign('result', $result);
	}

}