<?php
/**
 * 権限管理の一覧表示テンプレート
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

echo $this->NetCommonsHtml->css(array(
	'/user_roles/css/style.css',
	'/plugin_manager/css/style.css',
));
echo $this->NetCommonsHtml->script('/user_roles/js/user_roles.js');
?>

<?php
	echo $this->MessageFlash->description(
		__d('user_roles', 'You can add, edit and delete authority in your NetCommons.')
	);
?>

<div class="text-right">
	<?php echo $this->LinkButton->add(
		__d('user_roles', 'Add user role'),
		array('controller' => 'user_role_add', 'action' => 'user_role')
	); ?>
</div>

<div class="table-responsive">
	<table class="table" ng-controller="UserRolesController">
		<thead>
			<tr>
				<th>
					<?php echo __d('user_roles', 'User role name'); ?>
				</th>
				<th></th>
				<th>
					<?php echo __d('user_roles', 'User role description'); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($userRoles as $index => $userRole) : ?>
				<tr>
					<td>
						<div class="text-nowrap">
							<?php
								echo $this->NetCommonsHtml->link($userRole['UserRole']['name'], '#', array(
									'ng-click' => 'showUserRole(\'' . $userRole['UserRole']['key'] . '\')'
								));
							?>
						</div>
					</td>
					<td>
						<?php echo $this->LinkButton->edit(
								'',
								array('action' => 'edit', h($userRole['UserRole']['key'])),
								array('iconSize' => ' btn-xs')
							); ?>
					</td>
					<td>
						<?php echo h($userRole['UserRole']['description']); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
