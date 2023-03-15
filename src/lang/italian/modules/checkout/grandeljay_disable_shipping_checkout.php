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
    'LONG_DESCRIPTION' => 'Questo modulo fa parte del modulo Disattiva spedizione e dovrebbe avere lo stesso stato di attivazione.',
    'STATUS_TITLE'     => 'Stato',
    'STATUS_DESC'      => 'Selezioni Sì per attivare il modulo e No per disattivarlo.',
    'TEXT_TITLE'       => 'Disable shipping',
);

foreach ($translations as $key => $value) {
    $constant = Constants::MODULE_NAME_CHECKOUT . '_' . $key;

    define($constant, $value);
}
