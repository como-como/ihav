<div class="users form">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
			<legend><?php echo __('ユーザ登録'); ?></legend>
		<?php echo $this->Form->input('username', array(
			'label' => 'ユーザ名'
		));
		echo $this->Form->input('password', array(
			'label' => 'パスワード'
		));
		echo $this->Form->input('role', array(
			'options' => array('normal' => '一般', 'admin' => '管理者'),
			'label' => '属性'
		));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('登録')); ?>
</div>