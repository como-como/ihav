<div class="prices form">
<?php echo $this->Form->create('Price'); ?>
	<fieldset>
		<legend><?php echo __('Add Price'); ?></legend>
	<?php
		echo $this->Form->input('detail_id', array(
			'label' => '買ったもの（<a href="../details/add" target="_blank">新しく追加</a>）'
		));
		echo $this->Form->input('price', array(
			'label' => '価格',
			'class' => 'input_s'
		));
		echo $this->Form->input('amount', array(
			'label' => '数量',
			'class' => 'input_s'
		));
		echo $this->Form->input('unit', array(
			'label' => '単位',
			'class' => 'input_s'
		));
		echo $this->Form->input('store', array(
			'label' => '買ったお店',
			'class' => 'input_l'
		));
		echo $this->Form->input('date', array(
			'label' => '買った日'
		));
		//echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Prices'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Details'), array('controller' => 'details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detail'), array('controller' => 'details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
