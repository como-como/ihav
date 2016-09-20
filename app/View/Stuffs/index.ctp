<div class="stuffs index">
	<h2><?php echo __('Stuffs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<!--<th><?php //echo $this->Paginator->sort('cat_id'); ?></th>-->
			<th><?php echo $this->Paginator->sort('detail_id','買ったもの'); ?></th>
			<th><?php echo $this->Paginator->sort('amount','数'); ?></th>
			<th><?php echo $this->Paginator->sort('unit','単位'); ?></th>
			<th><?php echo $this->Paginator->sort('date','買った日'); ?></th>
			<th><?php echo $this->Paginator->sort('pastdates','経過日数'); ?></th>
			<!--<th><?php //echo $this->Paginator->sort('price','価格'); ?></th>-->
			<!--<th><?php //echo $this->Paginator->sort('store',''); ?></th>-->
			<th class="actions"><?php echo __(''); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($stuffs as $stuff): ?>
	<tr>
		<!--<td>
			<?php //echo $this->Html->link($stuff['Cat']['cat_name'], array('controller' => 'cats', 'action' => 'view', $stuff['Cat']['id'])); ?>
		</td>-->
		<td>
			<?php echo $this->Html->link($stuff['Detail']['name'], array('controller' => 'details', 'action' => 'view', $stuff['Detail']['id'])); ?>
		</td>
		<td><?php echo h($stuff['Stuff']['amount']); ?>&nbsp;</td>
		<td><?php echo h($stuff['Stuff']['unit']); ?>&nbsp;</td>
		<td><?php echo h($stuff['Stuff']['date']) ?>&nbsp;</td>
		<td><?php echo h($stuff['Stuff']['pastdates']) ?>&nbsp;</td>
		<!--<td><?php //echo h($stuff['Stuff']['price']); ?>&nbsp;</td>-->
		<!--<td><?php //echo h($stuff['Stuff']['store']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $stuff['Stuff']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stuff['Stuff']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stuff['Stuff']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $stuff['Stuff']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Stuff'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cats'), array('controller' => 'cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cat'), array('controller' => 'cats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Details'), array('controller' => 'details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detail'), array('controller' => 'details', 'action' => 'add')); ?> </li>
	</ul>
</div>