<div class="details view">
<h2><?php echo __('Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($detail['Detail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cat'); ?></dt>
		<dd>
			<?php echo $this->Html->link($detail['Cat']['cat_name'], array('controller' => 'cats', 'action' => 'view', $detail['Cat']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($detail['Detail']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lowest'); ?></dt>
		<dd>
			<?php echo h($detail['Detail']['lowest']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($detail['Detail']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit'); ?></dt>
		<dd>
			<?php echo h($detail['Detail']['unit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store'); ?></dt>
		<dd>
			<?php echo h($detail['Detail']['store']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($detail['Detail']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($detail['Detail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($detail['Detail']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Detail'), array('action' => 'edit', $detail['Detail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Detail'), array('action' => 'delete', $detail['Detail']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $detail['Detail']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cats'), array('controller' => 'cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cat'), array('controller' => 'cats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stuffs'), array('controller' => 'stuffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stuff'), array('controller' => 'stuffs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Stuffs'); ?></h3>
	<?php if (!empty($detail['Stuff'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cat Id'); ?></th>
		<th><?php echo __('Detail Id'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Unit'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Store'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($detail['Stuff'] as $stuff): ?>
		<tr>
			<td><?php echo $stuff['id']; ?></td>
			<td><?php echo $stuff['cat_id']; ?></td>
			<td><?php echo $stuff['detail_id']; ?></td>
			<td><?php echo $stuff['amount']; ?></td>
			<td><?php echo $stuff['unit']; ?></td>
			<td><?php echo $stuff['date']; ?></td>
			<td><?php echo $stuff['price']; ?></td>
			<td><?php echo $stuff['store']; ?></td>
			<td><?php echo $stuff['created']; ?></td>
			<td><?php echo $stuff['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'stuffs', 'action' => 'view', $stuff['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'stuffs', 'action' => 'edit', $stuff['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stuffs', 'action' => 'delete', $stuff['id']), array('confirm' => __('Are you sure you want to delete # %s?', $stuff['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Stuff'), array('controller' => 'stuffs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
