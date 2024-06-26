<?php

/**
 * Disable shipping
 *
 * @author  Jay Trees <disable-shipping@grandels.email>
 * @link    https://github.com/grandeljay/modified-disable-shipping
 * @package GrandelJayDisableShipping
 */

namespace Grandeljay\DisableShipping;

if (rth_is_module_disabled(Constants::MODULE_NAME_SYSTEM)) {
    return;
}

$translations = [
    'SHIPPING_TITLE' => 'Versandarten deaktivieren',
];

foreach ($translations as $key => $value) {
    $constant = Constants::MODULE_NAME_SYSTEM . '_' . $key;

    define($constant, $value);
}
