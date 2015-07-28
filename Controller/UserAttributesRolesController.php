<?php
/**
 * UserAttributesRoles Controller
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('UserRolesAppController', 'UserRoles.Controller');

/**
 * UserAttributesRoles Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\UserRoles\Controller
 */
class UserAttributesRolesController extends UserRolesAppController {

/**
 * use model
 *
 * @var array
 */
	public $uses = array(
		'UserRoles.UserRole'
	);

/**
 * use component
 *
 * @var array
 */
	public $components = array(
		'ControlPanel.ControlPanelLayout'
	);

/**
 * edit
 *
 * @return void
 */
	public function edit() {
	}

/**
 * use_user_manaer
 *
 * @return void
 */
	public function use_user_manaer() {
	}

}
