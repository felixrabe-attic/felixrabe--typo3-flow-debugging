<?php

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

$rootPath = isset($_SERVER['FLOW_ROOTPATH']) ? $_SERVER['FLOW_ROOTPATH'] : FALSE;
if ($rootPath === FALSE && isset($_SERVER['REDIRECT_FLOW_ROOTPATH'])) {
    $rootPath = $_SERVER['REDIRECT_FLOW_ROOTPATH'];
}
if ($rootPath === FALSE) {
    $rootPath = dirname(__FILE__) . '/../';
} elseif (substr($rootPath, -1) !== '/') {
    $rootPath .= '/';
}

require($rootPath . 'Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Core/Booting/Scripts.php');

$context = getenv('FLOW_CONTEXT') ?: (getenv('REDIRECT_FLOW_CONTEXT') ?: 'Development');
$settings = unserialize(file_get_contents('/tmp/settings.ser'));
$retVal = \TYPO3\Flow\Core\Booting\Scripts::executeCommand('typo3.flow:core:compile', $settings);

?>
