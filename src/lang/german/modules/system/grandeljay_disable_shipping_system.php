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
    'LONG_DESCRIPTION' => sprintf(
        'Ermöglicht es, Versandmethoden für bestimmte Produkte und Kategorien selektiv zu deaktivieren. Vergessen Sie nicht, auch die %s unter %s zu aktivieren oder zu deaktivieren.',
        sprintf(
            '<a href="/' . DIR_ADMIN . 'modules.php?set=categories">%s</a>',
            BOX_MODULE_TYPE
        ),
        sprintf(
            '<ul>
                <li>%s, und</li>
                <li>%s.</li>
            </ul>',
            '<a href="/' . DIR_ADMIN . 'modules.php?set=categories&module=grandeljay_disable_shipping_categories">grandeljay_disable_shipping_categories (categories)</a>',
            '<a href="/' . DIR_ADMIN . 'modules.php?set=checkout&module=grandeljay_disable_shipping_checkout">grandeljay_disable_shipping_checkout (checkout)</a>'
        )
    ),
    'STATUS_TITLE'     => 'Status',
    'STATUS_DESC'      => 'Wählen Sie Ja um das Modul zu aktivieren und Nein um es zu deaktivieren.',
    'TEXT_TITLE'       => 'Disable shipping',
);

foreach ($translations as $key => $value) {
    $constant = Constants::MODULE_NAME_SYSTEM . '_' . $key;

    define($constant, $value);
}
