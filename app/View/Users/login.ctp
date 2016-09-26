<div class="users form">
	<?php echo $this->Flash->render('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>
			<?php echo __('ユーザ名とパスワードを入力してください。'); ?>
		</legend>
		<?php echo $this->Form->input('username', array(
			'label' => 'ユーザ名'
		));
		echo $this->Form->input('password', array(
			'label' => 'パスワード'
		));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('ログイン')); ?>
	<p><a href="add">新規ユーザ登録</a></p>
</div>