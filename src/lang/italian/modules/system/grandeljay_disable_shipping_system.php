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
        'Le permette di disattivare selettivamente i metodi di spedizione per determinati prodotti e categorie. Non dimentichi di attivare o disattivare anche le %s sotto le %s.',
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
    'STATUS_TITLE'     => 'Stato',
    'STATUS_DESC'      => 'Selezioni Sì per attivare il modulo e No per disattivarlo.',
    'TEXT_TITLE'       => 'Disable shipping',
];

foreach ($translations as $key => $value) {
    $constant = Constants::MODULE_NAME_SYSTEM . '_' . $key;

    define($constant, $value);
}
