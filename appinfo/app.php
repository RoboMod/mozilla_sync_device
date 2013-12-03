<?php

/**
 * ownCloud
 *
 * @author Andreas Ihrig (alias RoboMod)
 * @copyright 2013 Andreas Ihrig (alias RoboMod) mod.andy@gmx.de
 *
 */

// check if mozilla_sync is activated
if(\OCP\App::isEnabled('mozilla_sync')) {
	OC::$CLASSPATH['OCA\mozilla_sync_device\SyncJob'] = 'mozilla_sync_device/lib/syncjob.php';

	// Register Mozilla Sync for personal page
	\OCP\App::registerPersonal('mozilla_sync_device', 'settings');
	
	// Create and register sceduled sync job
	$job = new SyncJob();
	OCP\BackgroundJob::registerJob($job):
	
} else {
	// Load translations
	$l = OC_L10N::get('core');
	
	$msg = $l->t('Can not enable the News app because the App Framework App is disabled');
	\OCP\Util::writeLog('news', $msg, \OCP\Util::ERROR);
}