<?php
$tmpl = null;

$sync_exists = \OCP\User::getUser();

// No email address set
if (is_null($sync_exists)) {
    $tmpl = new \OCP\Template('mozilla_sync_device', 'nosync');
} else {
    // Load JavaScript file
    \OCP\Util::addScript("mozilla_sync_device", "settings");
    
    $tmpl = new \OCP\Template('mozilla_sync_device', 'settings');
}

return $tmpl->fetchPage();
