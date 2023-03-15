<?php

/**
 * Sets the selected checkboxes for categories.
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

if (rth_is_module_disabled(Constants::MODULE_NAME_SYSTEM) || rth_is_module_disabled(Constants::MODULE_NAME_CATEGORIES)) {
    return;
}

class grandeljay_disable_shipping_categories extends StdModule
{
    public const VERSION = Constants::MODULE_VERSION;

    public function __construct()
    {
        parent::__construct(Constants::MODULE_NAME_CATEGORIES);

        $this->checkForUpdate(true);
    }

    public function insert_category_before(array $sqlDataArray, array $categoryData): array
    {
        if (isset($categoryData[Constants::TABLE_COLUMN])) {
            $sqlDataArray[Constants::TABLE_COLUMN] = json_encode($categoryData[Constants::TABLE_COLUMN]);
        } else {
            $sqlDataArray[Constants::TABLE_COLUMN] = '{}';
        }

        return $sqlDataArray;
    }

    public function insert_product_before(array $sqlDataArray, array $productData): array
    {
        if (isset($productData[Constants::TABLE_COLUMN])) {
            $sqlDataArray[Constants::TABLE_COLUMN] = json_encode($productData[Constants::TABLE_COLUMN]);
        } else {
            $sqlDataArray[Constants::TABLE_COLUMN] = '{}';
        }

        return $sqlDataArray;
    }

    protected function updateSteps()
    {
        if (-1 === version_compare($this->getVersion(), self::VERSION)) {
            $this->setVersion(self::VERSION);

            return self::UPDATE_SUCCESS;
        }

        return self::UPDATE_NOTHING;
    }
}
