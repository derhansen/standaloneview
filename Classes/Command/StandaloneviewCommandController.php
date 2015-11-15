<?php
namespace Derhansen\Standaloneview\Command;

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
 * Class StandaloneviewCommandController
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class StandaloneviewCommandController extends \TYPO3\CMS\Extbase\Mvc\Controller\CommandController {

	/**
	 * @var \Derhansen\Standaloneview\Service\StandaloneViewService
	 * @inject
	 */
	protected $standaloneViewService;

	/**
	 * The render command
	 *
	 * @param string $language The language
	 * @return void
	 */
	public function renderCommand($language = '') {
		$result = $this->standaloneViewService->renderStandaloneView($language);
		$this->outputLine($result);
	}

	/**
	 * The renderMultiple command
	 *
	 * @return void
	 */
	public function renderMultipleCommand() {
		$languages = array(
				'' => '',
				'de' => 'de',
				'dk' => 'dk'
		);

		foreach ($languages as $language) {
			$result = $this->standaloneViewService->renderStandaloneView($language);
			$this->outputLine($result);
		}
	}
}