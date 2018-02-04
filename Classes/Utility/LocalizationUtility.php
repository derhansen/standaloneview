<?php
namespace Derhansen\Standaloneview\Utility;

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
 * LocalizationUtility
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class LocalizationUtility extends \TYPO3\CMS\Extbase\Utility\LocalizationUtility
{
    /**
     * Resets the language cache for the given extension key
     *
     * @param string $extensionName
     */
    public static function resetLocalizationCache($extensionName)
    {
        unset(static::$LOCAL_LANG[$extensionName]);
    }
}
