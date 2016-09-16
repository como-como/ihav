<div class="cats view">
<h2><?php echo __('Cat'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cat['Cat']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cat Name'); ?></dt>
		<dd>
			<?php echo h($cat['Cat']['cat_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($cat['Cat']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cat['Cat']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cat'), array('action' => 'edit', $cat['Cat']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cat'), array('action' => 'delete', $cat['Cat']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cat['Cat']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Cats'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cat'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Details'), array('controller' => 'details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detail'), array('controller' => 'details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stuffs'), array('controller' => 'stuffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stuff'), array('controller' => 'stuffs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Details'); ?></h3>
	<?php if (!empty($cat['Detail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cat Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Lowest'); ?></th>
		<th><?php echo __('Store'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cat['Detail'] as $detail): ?>
		<tr>
			<td><?php echo $detail['id']; ?></td>
			<td><?php echo $detail['cat_id']; ?></td>
			<td><?php echo $detail['name']; ?></td>
			<td><?php echo $detail['lowest']; ?></td>
			<td><?php echo $detail['store']; ?></td>
			<td><?php echo $detail['date']; ?></td>
			<td><?php echo $detail['created']; ?></td>
			<td><?php echo $detail['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'details', 'action' => 'view', $detail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'details', 'action' => 'edit', $detail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'details', 'action' => 'delete', $detail['id']), array('confirm' => __('Are you sure you want to delete # %s?', $detail['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Detail'), array('controller' => 'details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Stuffs'); ?></h3>
	<?php if (!empty($cat['Stuff'])): ?>
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
	<?php foreach ($cat['Stuff'] as $stuff): ?>
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
