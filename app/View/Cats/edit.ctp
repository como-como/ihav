<div class="cats form">
<?php echo $this->Form->create('Cat'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cat_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cat.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Cat.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Cats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Details'), array('controller' => 'details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detail'), array('controller' => 'details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stuffs'), array('controller' => 'stuffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stuff'), array('controller' => 'stuffs', 'action' => 'add')); ?> </li>
	</ul>
</div>
