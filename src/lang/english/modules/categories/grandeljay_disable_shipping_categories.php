<?php

/**
 * Disable shipping
 *
 * @author  Jay Trees <disable-shipping@grandels.email>
 * @link    https://github.com/grandeljay/modified-disable-shipping
 * @package GrandelJayDisableShipping
 */

use Grandeljay\DisableShipping\Constants;

$translations = array(
    /** Module */
    'TITLE'            => 'grandeljay - Disable shipping',
    'LONG_DESCRIPTION' => 'This module is part of the Disable shipping module and should have the same activation status.',
    'STATUS_TITLE'     => 'Status',
    'STATUS_DESC'      => 'Select Yes to activate the module and No to deactivate it.',
    'TEXT_TITLE'       => 'Disable shipping',
);

foreach ($translations as $key => $value) {
    $constant = Constants::MODULE_NAME_CATEGORIES . '_' . $key;

    define($constant, $value);
}
