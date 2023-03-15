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
    'LONG_DESCRIPTION' => 'Ce module fait partie du module Disable shipping et devrait avoir le même statut d\'activation.',
    'STATUS_TITLE'     => 'Statut',
    'STATUS_DESC'      => 'Sélectionnez Oui pour activer le module et Non pour le désactiver.',
    'TEXT_TITLE'       => 'Disable shipping',
);

foreach ($translations as $key => $value) {
    $constant = Constants::MODULE_NAME_CHECKOUT . '_' . $key;

    define($constant, $value);
}
