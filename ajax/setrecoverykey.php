<?php

/**
* ownCloud
*
* @author Andreas Ihrig (alias RoboMod)
* @copyright 2013 Andreas Ihrig (alias RoboMod)
*
*/

// Check if user is logged in
\OCP\JSON::checkLoggedIn();

// Check if valid requesttoken was sent
\OCP\JSON::callCheck();

// Load translations
$l=OC_L10N::get('core');

// Get recovery key from POST
$recovery_key = filter_var($_POST['recovery_key'], FILTER_SANITIZE_STRING);
if($recovery_key) {
	if(\OCA\mozilla_sync\User::hasSyncAccount()) {
		\OCP\Config::setUserValue(OCP\User::getUser(), 'mozilla_sync_device', 'recovery_key', $recovery_key);
		// Send success message
		\OCP\JSON::success(array( "data" => array( "message" => $l->t("Recovery key saved") )));
	} else {
		// Send error message
		\OCP\JSON::error(array( "data" => array( "message" => $l->t("No active sync found") )));
	}
} else {
	// Send error message
	\OCP\JSON::error(array( "data" => array( "message" => $l->t("Data invalid") )));
}



