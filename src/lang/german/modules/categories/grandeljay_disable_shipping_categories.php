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
    'LONG_DESCRIPTION' => 'Dieses Modul ist Teil vom Disable shipping Modul und sollte den gleichen Aktivierungsstatus haben.',
    'STATUS_TITLE'     => 'Status',
    'STATUS_DESC'      => 'Wählen Sie Ja um das Modul zu aktivieren und Nein um es zu deaktivieren.',
    'TEXT_TITLE'       => 'Disable shipping',
);

foreach ($translations as $key => $value) {
    $constant = Constants::MODULE_NAME_CATEGORIES . '_' . $key;

    define($constant, $value);
}
