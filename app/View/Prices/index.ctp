<div class="prices index">
	<h2><?php echo __('そこね'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th><?php echo $this->Paginator->sort('detail_id','買ったもの'); ?></th>
		<th><?php echo $this->Paginator->sort('price','価格'); ?></th>
		<th><?php echo $this->Paginator->sort('amount','数量'); ?></th>
		<th><?php echo $this->Paginator->sort('unit','単位'); ?></th>
		<th><?php echo $this->Paginator->sort('store','買ったお店'); ?></th>
		<th><?php echo $this->Paginator->sort('date','買った日'); ?></th>
		<th class="actions"><?php echo __(''); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($prices as $price): ?>
	<tr>
		<td><?php echo h($price['Detail']['name']); ?>&nbsp;</td>
		<td class="a-right"><?php echo h($price['Price']['price']); ?>&nbsp;</td>
		<td class="a-right"><?php echo h($price['Price']['amount']); ?>&nbsp;</td>
		<td><?php echo h($price['Price']['unit']); ?>&nbsp;</td>
		<td><?php echo h($price['Price']['store']); ?>&nbsp;</td>
		<td class="a-center"><?php echo h(substr(str_replace('-', '/', $price['Price']['date']), 5)) ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $price['Price']['id'])); ?>
			<?php echo $this->Html->link(__('編集'), array('action' => 'edit', $price['Price']['id'])); ?>
			<?php echo $this->Form->postLink(__('消す'), array('action' => 'delete', $price['Price']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $price['Price']['id']))); ?>
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
	<!--<h3><?php //echo __('Actions'); ?></h3>-->
	<ul>
		<li><?php echo $this->Html->link(__('買ったものを見る'), array('controller' => 'stuffs','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('買ったものを登録'), array('controller' => 'stuffs','action' => 'add')); ?></li>
		<!--<li><?php //echo $this->Html->link(__('New Price'), array('action' => 'add')); ?></li>-->
		<!--<li><?php //echo $this->Html->link(__('List Details'), array('controller' => 'details', 'action' => 'index')); ?> </li>-->
		<!--<li><?php //echo $this->Html->link(__('New Detail'), array('controller' => 'details', 'action' => 'add')); ?> </li>-->
		<!--<li><?php //echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>-->
		<!--<li><?php //echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>-->
	</ul>
</div>
