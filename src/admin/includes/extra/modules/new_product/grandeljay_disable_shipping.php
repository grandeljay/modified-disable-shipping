<?php

/**
 * Add checkboxes to select shipping methods in the edit products screen.
 *
 * @author  Jay Trees <disable-shipping@grandels.email>
 * @link    https://github.com/grandeljay/modified-disable-shipping
 * @package GrandelJayDisableShipping
 */

namespace Grandeljay\DisableShipping;

if (rth_is_module_disabled(Constants::MODULE_NAME_SYSTEM)) {
    return;
}

require DIR_FS_EXTERNAL . 'grandeljay/disable-shipping/grandeljay_disable_shipping.php';
