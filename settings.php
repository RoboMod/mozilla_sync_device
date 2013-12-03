<?php

/**
 * ownCloud
 *
 * @author Andreas Ihrig (alias RoboMod)
 * @copyright 2013 Andreas Ihrig (alias RoboMod) mod.andy@gmx.de
 *
 */

$tmpl = null;

// Check if user has an active sync account
if (!\OCA\mozilla_sync\User::hasSyncAccount()) {
    $tmpl = new \OCP\Template('mozilla_sync_device', 'nosync');
} else {
    // Load JavaScript file
    \OCP\Util::addScript("mozilla_sync_device", "settings");
    
    $tmpl = new \OCP\Template('mozilla_sync_device', 'settings');
}

return $tmpl->fetchPage();
