<?php
/**
 * Insert records migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsMigration', 'NetCommons.Config/Migration');

/**
 * Insert records migration
 *
 * @package NetCommons\UserRoles\Config\Migration
 */
class UserRoleSettingRecords extends NetCommonsMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'user_role_setting_records';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(),
		'down' => array(),
	);

/**
 * Insert records
 *
 * @var array $migration
 */
	public $records = array(
		'UserRoleSetting' => array(
			array('role_key' => 'system_administrator', 'default_role_key' => 'system_administrator', 'default_room_role_key' => 'room_administrator', 'public_room_creatable' => '1', 'group_room_creatable' => '1', 'use_private_room' => '1', 'private_room_upload_max_size' => '1073741824', ),
			array('role_key' => 'user_administrator', 'default_role_key' => 'user_administrator', 'default_room_role_key' => 'chief_editor', 'public_room_creatable' => '0', 'group_room_creatable' => '1', 'use_private_room' => '1', 'private_room_upload_max_size' => '104857600', ),
			array('role_key' => 'chief_user', 'default_role_key' => 'chief_user', 'default_room_role_key' => 'editor', 'public_room_creatable' => '0', 'group_room_creatable' => '0', 'use_private_room' => '1', 'private_room_upload_max_size' => '10485760', ),
			array('role_key' => 'common_user', 'default_role_key' => 'common_user', 'default_room_role_key' => 'general_user', 'public_room_creatable' => '0', 'group_room_creatable' => '0', 'use_private_room' => '1', 'private_room_upload_max_size' => '10485760', ),
			array('role_key' => 'guest_user', 'default_role_key' => 'guest_user', 'default_room_role_key' => 'visitor', 'public_room_creatable' => '0', 'group_room_creatable' => '0', 'use_private_room' => '0', 'private_room_upload_max_size' => '0', ),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		if ($direction === 'down') {
			return true;
		}
		foreach ($this->records as $model => $records) {
			if (!$this->updateRecords($model, $records)) {
				return false;
			}
		}
		return true;
	}
}
