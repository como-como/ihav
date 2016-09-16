<div class="stuffs view">
<h2><?php echo __('Stuff'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stuff['Stuff']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cat'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stuff['Cat']['id'], array('controller' => 'cats', 'action' => 'view', $stuff['Cat']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stuff['Detail']['name'], array('controller' => 'details', 'action' => 'view', $stuff['Detail']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($stuff['Stuff']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit'); ?></dt>
		<dd>
			<?php echo h($stuff['Stuff']['unit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($stuff['Stuff']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($stuff['Stuff']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store'); ?></dt>
		<dd>
			<?php echo h($stuff['Stuff']['store']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($stuff['Stuff']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($stuff['Stuff']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stuff'), array('action' => 'edit', $stuff['Stuff']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stuff'), array('action' => 'delete', $stuff['Stuff']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $stuff['Stuff']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Stuffs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stuff'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cats'), array('controller' => 'cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cat'), array('controller' => 'cats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Details'), array('controller' => 'details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detail'), array('controller' => 'details', 'action' => 'add')); ?> </li>
	</ul>
</div>
