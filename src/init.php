<?php

/**
 * AbraFlexi Digest - Dayly 
 *
 * @author     Vítězslav Dvořák <info@vitexsofware.cz>
 * @copyright  (G) 2018-2020 Vitex Software
 */

namespace AbraFlexi\Digest;

define('MODULE_PATH', './modules');
define('MODULE_DAILY_PATH', './modules.daily');
define('MODULE_WEEKLY_PATH', './modules.weekly');
define('MODULE_MONTHLY_PATH', './modules.monthly');
define('MODULE_YEARLY_PATH', './modules.yearly');
define('MODULE_ALLTIME_PATH', './modules.alltime');

define('STYLE_DIR', './css');

require_once '../vendor/autoload.php';
$shared = \Ease\Shared::instanced();
if (file_exists('../client.json')) {
    $shared->loadConfig('../client.json', true);
} else {
    foreach ($_ENV as $envKey => $envVal) {
        $shared->setConfigValue($envKey, $envVal);
    }
}

if (file_exists('../digest.json')) {
    $shared->loadConfig('../digest.json', true);
}
$localer = new \Ease\Locale('cs_CZ', '../i18n', 'abraflexi-digest');

$myCompany = new \AbraFlexi\Company($shared->getConfigValue('ABRAFLEXI_COMPANY'));
$myCompanyName = $myCompany->getDataValue('nazev');
