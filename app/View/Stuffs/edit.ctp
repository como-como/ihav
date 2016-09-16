<div class="stuffs form">
<?php echo $this->Form->create('Stuff'); ?>
	<fieldset>
		<legend><?php echo __('買ったものを編集'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cat_id');
		echo $this->Form->input('detail_id');
		echo $this->Form->input('date');
		echo $this->Form->input('amount');
		echo $this->Form->input('unit');
		echo $this->Form->input('price');
		echo $this->Form->input('store');
	?>
	</fieldset>
<?php echo $this->Form->end(__('登録する')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Stuff.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Stuff.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Stuffs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cats'), array('controller' => 'cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cat'), array('controller' => 'cats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Details'), array('controller' => 'details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detail'), array('controller' => 'details', 'action' => 'add')); ?> </li>
	</ul>
</div>
