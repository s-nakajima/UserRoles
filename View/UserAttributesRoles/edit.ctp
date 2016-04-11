<?php
/**
 * 権限管理の個人情報設定タブのテンプレート
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

echo $this->NetCommonsHtml->css('/user_roles/css/style.css');
?>

<?php echo $this->element('UserRoles.subtitle'); ?>
<?php echo $this->Wizard->outputWizard(UserRolesAppController::WIZARD_USER_ATTRIBUTES_ROLES); ?>

<?php echo $this->NetCommonsForm->create('UserAttributesRoles', array(
		'type' => 'put',
		'url' => $this->NetCommonsHtml->url(array('action' => 'edit', 'key' => $roleKey))
	)); ?>

	<?php echo $this->UserAttributeLayout->renderRow('UserAttributesRoles/render_edit_row'); ?>

	<div class="text-center">
		<?php echo $this->Button->cancelAndSave(
				__d('net_commons', 'Cancel'),
				__d('net_commons', 'OK'),
				$this->NetCommonsHtml->url(array('controller' => 'user_roles', 'action' => 'index')),
				array(),
				array(
					'ng-disabled' => '(sending || ' . ($this->data['UserRoleSetting']['is_usable_user_manager'] ? 'true' : 'false') . ')'
				)
			); ?>
	</div>

<?php echo $this->NetCommonsForm->end();
