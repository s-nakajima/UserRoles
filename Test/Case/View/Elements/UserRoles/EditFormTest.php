<?php
/**
 * View/Elements/UserRoles/edit_formのテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('UserRolesNetCommonsControllerTestCase', 'UserRoles.TestSuite');
App::uses('TestAuthGeneral', 'AuthGeneral.TestSuite');

/**
 * View/Elements/UserRoles/edit_formのテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\UserRoles\Test\Case\View\Elements\UserRoles\EditForm
 */
class UserRolesViewElementsUserRolesEditFormTest extends UserRolesNetCommonsControllerTestCase {

/**
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'user_roles';

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		//テストプラグインのロード
		NetCommonsCakeTestCase::loadTestPlugin($this, 'UserRoles', 'TestUserRoles');
		//テストコントローラ生成
		$this->generateNc('TestUserRoles.TestViewElementsUserRolesEditForm');

		//ログイン
		TestAuthGeneral::login($this);
	}

/**
 * View/Elements/UserRoles/edit_formのテスト
 *
 * @return void
 */
	public function testEditForm() {
		//テスト実行
		$this->_testGetAction('/test_user_roles/test_view_elements_user_roles_edit_form/edit_form_by_edit',
				array('method' => 'assertNotEmpty'), null, 'view');

		//チェック
		$pattern = '/' . preg_quote('View/Elements/UserRoles/edit_form', '/') . '/';
		$this->assertRegExp($pattern, $this->view);

		$this->assertInput('input', 'data[UserRole][0][id]', '8', $this->view);
		$this->assertInput('input', 'data[UserRole][0][language_id]', '1', $this->view);
		$this->assertInput('input', 'data[UserRole][0][type]', '1', $this->view);
		$this->assertInput('input', 'data[UserRole][0][name]', 'Test user', $this->view);
		$this->assertInput('input', 'data[UserRole][1][id]', '7', $this->view);
		$this->assertInput('input', 'data[UserRole][1][language_id]', '2', $this->view);
		$this->assertInput('input', 'data[UserRole][1][type]', '1', $this->view);
		$this->assertInput('input', 'data[UserRole][1][name]', 'Test user', $this->view);
		$this->assertInput('select', 'data[UserRoleSetting][origin_role_key]', null, $this->view);
	}

/**
 * View/Elements/UserRoles/edit_formのテスト
 *
 * @return void
 */
	public function testAddForm() {
		//テスト実行
		$this->_testGetAction('/test_user_roles/test_view_elements_user_roles_edit_form/edit_form_by_add',
				array('method' => 'assertNotEmpty'), null, 'view');

		//チェック
		$pattern = '/' . preg_quote('View/Elements/UserRoles/edit_form', '/') . '/';
		$this->assertRegExp($pattern, $this->view);

		$this->assertInput('input', 'data[UserRole][0][id]', null, $this->view);
		$this->assertInput('input', 'data[UserRole][0][language_id]', '1', $this->view);
		$this->assertInput('input', 'data[UserRole][0][type]', '1', $this->view);
		$this->assertInput('input', 'data[UserRole][0][name]', null, $this->view);
		$this->assertInput('input', 'data[UserRole][1][id]', null, $this->view);
		$this->assertInput('input', 'data[UserRole][1][language_id]', '2', $this->view);
		$this->assertInput('input', 'data[UserRole][1][type]', '1', $this->view);
		$this->assertInput('input', 'data[UserRole][1][name]', null, $this->view);
		$this->assertInput('select', 'data[UserRoleSetting][origin_role_key]', null, $this->view);

		$pattern = '/' . preg_quote('data[UserRole][2][id]', '/') . '/';
		$this->assertNotRegExp($pattern, $this->view);
	}

}
