<?php

/**
 * Disable shipping
 *
 * @author  Jay Trees <disable-shipping@grandels.email>
 * @link    https://github.com/grandeljay/modified-disable-shipping
 * @package GrandelJayDisableShipping
 */

namespace Grandeljay\DisableShipping;

$module_directory         = DIR_FS_CATALOG_MODULES . 'shipping/';
$module_directory_include = DIR_WS_CATALOG . DIR_WS_MODULES . 'shipping/';
$module_key               = 'MODULE_SHIPPING_INSTALLED';
$module_extension         = 'php';
$check_language_file      = true;

$grandeljay_disable_shipping = null;
$table_column                = Constants::TABLE_COLUMN;

if (isset($cInfo->$table_column)) {
    $grandeljay_disable_shipping = json_decode($cInfo->$table_column, true);
}

if (isset($pInfo->$table_column)) {
    $grandeljay_disable_shipping = json_decode($pInfo->$table_column, true);
}
?>

<style type="text/css">
    label.disable-shipping {
        display: inline-block;
        cursor: pointer;
        user-select: none;
    }

    label.disable-shipping > span {
        transition: 0.4s ease opacity;

        font-size: 11px;
        color: #777;
        opacity: 0;
    }
    label.disable-shipping:hover > span {
        opacity: 1;
    }

    input[type="checkbox"].ChkBox:not(old):not([disabled]) + em,
    input[type="radio"].ChkBox:not(old):not([disabled]) + em {
        line-height: 2em;
    }
</style>

<table class="tableInput border0">
    <thead>
        <tr>
            <th colspan="2"><?= constant(Constants::MODULE_NAME_SYSTEM . '_SHIPPING_TITLE') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach (auto_include($module_directory, $module_extension) as $file) {
            $class    = pathinfo($file, PATHINFO_FILENAME);
            $filename = $class . '.' . $module_extension;

            require_once DIR_FS_LANGUAGES . $_SESSION['language'] . '/modules/shipping/' . $filename;
            require_once $module_directory . $filename;

            $module = new $class();

            if (!$module->enabled) {
                continue;
            }
            ?>
            <tr>
                <td class="main">
                    <label class="disable-shipping">
                        <?php
                        /** Module name */
                        $module_name                 = $module->title;
                        $module_name_without_version = 'MODULE_SHIPPING_' . strtoupper($module->code) . '_TEXT_TITLE';

                        if (defined($module_name_without_version)) {
                            $module_name = constant($module_name_without_version);
                        }

                        /** Disable */
                        $checked = isset($grandeljay_disable_shipping[$class]['disable'])
                                 ? $grandeljay_disable_shipping[$class]['disable']
                                 : false;

                        echo xtc_draw_checkbox_field('grandeljay_disable_shipping[' . $class . '][disable]', true, $checked) . ' ' . $module_name;
                        ?>
                        <span>(<?= $filename ?>)</span>
                    </label>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>
