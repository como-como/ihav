<div class="details form">
<?php echo $this->Form->create('Detail'); ?>
	<fieldset>
		<legend><?php echo __('Add Detail'); ?></legend>
	<?php
		echo $this->Form->input('cat_id');
		echo $this->Form->input('name');
		echo $this->Form->input('lowest');
		echo $this->Form->input('amount');
		echo $this->Form->input('unit');
		echo $this->Form->input('store');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cats'), array('controller' => 'cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cat'), array('controller' => 'cats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stuffs'), array('controller' => 'stuffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stuff'), array('controller' => 'stuffs', 'action' => 'add')); ?> </li>
	</ul>
</div>
