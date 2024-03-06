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
    'LONG_DESCRIPTION' => sprintf(
        'Allows you to selectivly disable shipping methods for specific products and categories. Don\'t forget to also enable or disable the %s\'s under %s',
        sprintf(
            '<a href="/' . DIR_ADMIN . 'modules.php?set=categories">%s</a>',
            BOX_MODULE_TYPE
        ),
        sprintf(
            '<ul>
                <li>%s, and</li>
                <li>%s.</li>
            </ul>',
            '<a href="/' . DIR_ADMIN . 'modules.php?set=categories&module=grandeljay_disable_shipping_categories">grandeljay_disable_shipping_categories (categories)</a>',
            '<a href="/' . DIR_ADMIN . 'modules.php?set=checkout&module=grandeljay_disable_shipping_checkout">grandeljay_disable_shipping_checkout (checkout)</a>'
        )
    ),
    'STATUS_TITLE'     => 'Status',
    'STATUS_DESC'      => 'Select Yes to activate the module and No to deactivate it.',
    'TEXT_TITLE'       => 'Disable shipping',
];

foreach ($translations as $key => $value) {
    $constant = Constants::MODULE_NAME_SYSTEM . '_' . $key;

    define($constant, $value);
}
