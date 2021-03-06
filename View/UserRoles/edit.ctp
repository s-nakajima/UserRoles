<?php
/**
 * 権限管理の会員権限の追加・編集テンプレート
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

echo $this->NetCommonsHtml->css('/user_roles/css/style.css');
?>

<?php
	echo $this->UserRoleForm->settingTabs(UserRolesAppController::WIZARD_USER_ROLES);
	echo $this->element('UserRoles.subtitle');
	echo $this->MessageFlash->description(
		__d('user_roles', 'Enter the title of the authority, enter the description of authority, and press [OK].')
	);
?>

<div class="panel panel-default">
	<?php echo $this->NetCommonsForm->create('UserRoleSetting'); ?>

	<div class="panel-body">
		<?php echo $this->SwitchLanguage->tablist('user-roles-'); ?>

		<div class="tab-content">
			<?php echo $this->element('UserRoles/edit_form'); ?>
		</div>
	</div>

	<div class="panel-footer text-center">
		<?php echo $this->Button->cancelAndSave(
				__d('net_commons', 'Cancel'),
				__d('net_commons', 'OK'),
				NetCommonsUrl::actionUrlAsArray(array('action' => 'index'))
			); ?>
	</div>

	<?php echo $this->NetCommonsForm->end(); ?>
</div>

<?php if ($this->request->params['action'] === 'edit') : ?>
	<?php if (! Hash::get($this->request->data, 'UserRole.0.is_system')) : ?>
		<?php echo $this->element('UserRoles/delete_form'); ?>
	<?php endif; ?>
<?php endif;