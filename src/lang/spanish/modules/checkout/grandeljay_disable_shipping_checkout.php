<?php

/**
 * Disable shipping
 *
 * @author  Jay Trees <disable-shipping@grandels.email>
 * @link    https://github.com/grandeljay/modified-disable-shipping
 * @package GrandelJayDisableShipping
 */

use Grandeljay\DisableShipping\Constants;

$translations = [
    /** Module */
    'TITLE'            => 'grandeljay - Disable shipping',
    'LONG_DESCRIPTION' => 'Este módulo forma parte del módulo Desactivar envío y debería tener el mismo estado de activación.',
    'STATUS_TITLE'     => 'Estado',
    'STATUS_DESC'      => 'Seleccione Sí para activar el módulo y No para desactivarlo.',
    'TEXT_TITLE'       => 'Disable shipping',
];

foreach ($translations as $key => $value) {
    $constant = Constants::MODULE_NAME_CHECKOUT . '_' . $key;

    define($constant, $value);
}
