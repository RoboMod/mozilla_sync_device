<?php

/**
 * ownCloud
 *
 * @author Andreas Ihrig (alias RoboMod)
 * @copyright 2013 Andreas Ihrig (alias RoboMod) mod.andy@gmx.de
 *
 */

namespace OCA\mozilla_sync_device;

class SyncJob  {
	static public function run() {
		$userIds = \OCP\User::getDisplayNames();
		
		foreach ($userIds as $userName => $userId) {
			if(		\OCA\mozilla_sync\User::hasSyncAccount($userName)
				&&	\OCP\Config::getUserValue($userId, 'mozilla_sync_device', 'recovery_key', "") !== "") {
				
				$syncId = \OCA\mozilla_sync\User::userNameToSyncId($userName);
				$collectionId = \OCA\mozilla_sync\Storage::collectionNameToIndex($syncId, "bookmarks");
				
				// most part of the next lines come from private \OCA\mozilla_sync\StorageService::getCollection
				$query = \OCP\DB::prepare('SELECT `payload`, `name` AS `id`, `modified`, `sortindex`'.
					' FROM `*PREFIX*mozilla_sync_wbo` WHERE `collectionid` = ?');
				$result = $query->execute(array($collectionId));

				if ($result != false) {
					$resultArray = array();

					while (($row = $result->fetchRow())) {
						$resultArray[] = \OCA\mozilla_sync\StorageService::forceTypeCasting($row);
					}
					
					\OCP\Util::writeLog('mozilla_sync_device', "collections size for syncId = ".$syncId.": ".count($resultArray), \OCP\Util::INFO);
				}				
			}
		}
    }
}