<?php

/**
 * Disable shipping
 *
 * @author  Jay Trees <disable-shipping@grandels.email>
 * @link    https://github.com/grandeljay/modified-disable-shipping
 * @package GrandelJayDisableShipping
 *
 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
 */

use RobinTheHood\ModifiedStdModule\Classes\StdModule;
use Grandeljay\DisableShipping\Constants;

class grandeljay_disable_shipping_system extends StdModule
{
    public const VERSION = Constants::MODULE_VERSION;

    public function __construct()
    {
        parent::__construct(Constants::MODULE_NAME_SYSTEM);

        $this->checkForUpdate(true);
    }

    public function display()
    {
        return $this->displaySaveButton();
    }

    public function install()
    {
        parent::install();

        foreach (array(\TABLE_PRODUCTS, \TABLE_CATEGORIES) as $table) {
            xtc_db_query(
                sprintf(
                    'ALTER TABLE `%s`
                      ADD COLUMN `%s` JSON NULL DEFAULT NULL;',
                    $table,
                    Constants::TABLE_COLUMN
                )
            );
        }
    }

    protected function updateSteps()
    {
        if (-1 === version_compare($this->getVersion(), self::VERSION)) {
            $this->setVersion(self::VERSION);

            return self::UPDATE_SUCCESS;
        }

        return self::UPDATE_NOTHING;
    }

    public function remove()
    {
        parent::remove();

        foreach (array(\TABLE_PRODUCTS, \TABLE_CATEGORIES) as $table) {
            xtc_db_query(
                sprintf(
                    'ALTER TABLE `%s`
                     DROP COLUMN `%s`;',
                    $table,
                    Constants::TABLE_COLUMN
                )
            );
        }
    }
}
