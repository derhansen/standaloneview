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
	 * Renders a standalone view with the given language
	 *
	 * @param array $formdata
	 * @return void
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

	/**
	 * Renders multiple standalone views in one run switching the language several times
	 *
	 * @return void
	 */
	public function multipleAction() {
		$languages = array(
				'' => 'Default',
				'de' => 'Deutsch',
				'dk' => 'Dansk'
		);

		$result = '';
		foreach ($languages as $language => $value) {
			$result .= $this->standaloneViewService->renderStandaloneView($language);
		}
		$this->view->assign('languages', $languages);
		$this->view->assign('result', $result);
	}
}