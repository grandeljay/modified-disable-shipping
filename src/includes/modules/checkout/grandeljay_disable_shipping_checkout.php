<?php

/**
 * Deactivates the previously selected shipping methods.
 *
 * @author  Jay Trees <disable-shipping@grandels.email>
 * @link    https://github.com/grandeljay/modified-disable-shipping
 * @package GrandelJayDisableShipping
 *
 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 * @phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */

use Grandeljay\DisableShipping\Constants;
use RobinTheHood\ModifiedStdModule\Classes\StdModule;

if (rth_is_module_disabled(Constants::MODULE_NAME_SYSTEM) || rth_is_module_disabled(Constants::MODULE_NAME_CHECKOUT)) {
    return;
}

class grandeljay_disable_shipping_checkout extends StdModule
{
    public const VERSION = Constants::MODULE_VERSION;

    public function __construct()
    {
        parent::__construct(Constants::MODULE_NAME_CHECKOUT);

        $this->checkForUpdate(true);
    }

    public function unallowed_shipping_modules(array $unallowedModules): array
    {
        $products = $_SESSION['cart']->contents;

        foreach ($products as $product_id_with_attributes => $product_quantity_with_attributes) {
            preg_match('/^\d+/', $product_id_with_attributes, $product_id_matches);
            $product_id = $product_id_matches[0];

            $product_category_query = xtc_db_query(
                sprintf(
                    '  SELECT *
                         FROM `%1$s`
                    LEFT JOIN `%2$s` ON `%1$s`.`categories_id` = `%2$s`.`categories_id`
                        WHERE `%1$s`.`products_id` = %3$s',
                    \TABLE_PRODUCTS_TO_CATEGORIES,
                    \TABLE_CATEGORIES,
                    $product_id
                )
            );

            /**
             * A product can be in multiple categories so we will disable the
             * selected shipping methods if either category forbids them.
             */
            while ($product_category = xtc_db_fetch_array($product_category_query)) {
                if (isset($product_category[Constants::TABLE_COLUMN])) {
                    $unallowedModules = array_merge($unallowedModules, $this->get_disabled_methods($product_category));
                }
            }

            /**
             * Override category settings when they exist int he product
             */
            $product_query = xtc_db_query(
                sprintf(
                    'SELECT *
                       FROM `%1$s`',
                    \TABLE_PRODUCTS,
                )
            );
            $product       = xtc_db_fetch_array($product_query);

            if (isset($product[Constants::TABLE_COLUMN])) {
                $unallowedModules = array_merge($unallowedModules, $this->get_disabled_methods($product));
            }
        }

        return $unallowedModules;
    }

    private function get_disabled_methods(array $product_or_category_data): array
    {
        $unallowed_modules = array();
        $disable_methods   = json_decode($product_or_category_data[Constants::TABLE_COLUMN], true);

        foreach ($disable_methods as $method => $data) {
            $is_disabled = '1' === $data['disable'];

            if ($is_disabled && !in_array($method, $unallowed_modules, true)) {
                $unallowed_modules[] = $method;
            }
        }

        return $unallowed_modules;
    }

    protected function updateSteps(): int
    {
        if (-1 === version_compare($this->getVersion(), self::VERSION)) {
            $this->setVersion(self::VERSION);

            return self::UPDATE_SUCCESS;
        }

        return self::UPDATE_NOTHING;
    }
}
