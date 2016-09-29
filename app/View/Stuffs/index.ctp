<div class="stuffs index">
	<!--<h2><?php //echo __('買ったもの一覧'); ?></h2>-->
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('cat_id','分類'); ?></th>
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
		<td
		<?php
			//if($stuff['Cat']['cat_name']==='野菜') {
				echo ' style="color:'. $stuff['Cat']['color'] .';"';
			/*} else if ($stuff['Cat']['cat_name']==='肉') {
				echo ' class="col_meat"';
			}*/
		?>>
			<?php //echo $this->Html->link($stuff['Cat']['cat_name'], array('controller' => 'cats', 'action' => 'view', $stuff['Cat']['id']));
			echo $stuff['Cat']['cat_name'];
			?>
		</td>
		<td>
			<?php echo $this->Html->link($stuff['Detail']['name'], array('controller' => 'details', 'action' => 'view', $stuff['Detail']['id'])); ?>
		</td>
		<td class="a-right"><?php echo h($stuff['Stuff']['amount']); ?>&nbsp;</td>
		<td><?php echo h($stuff['Stuff']['unit']); ?>&nbsp;</td>
		<td class="a-center"><?php echo h(substr(str_replace('-', '/', $stuff['Stuff']['date']), 5)) ?>&nbsp;</td>
		<td <?php
		// 経過日に応じて色を変える
		if($stuff['Stuff']['cat_id']==='1' && $stuff['Stuff']['pastdates']>7) {
			echo ' class="col-red"';
		} elseif ($stuff['Stuff']['cat_id']==='1' && $stuff['Stuff']['pastdates']>4) {
			echo ' class="col-yellow"';
		} elseif ($stuff['Stuff']['cat_id']==='2' && $stuff['Stuff']['pastdates']>1) {
			echo ' class="col-red"';
		} elseif ($stuff['Stuff']['cat_id']==='2' && $stuff['Stuff']['pastdates']>2) {
			echo ' class="col-yellow"';
		} elseif ( $stuff['Stuff']['pastdates']>17) {
			echo ' class="col-red"';
		} elseif ( $stuff['Stuff']['pastdates']>9) {
			echo ' class="col-yellow"';
		} else {
			echo ' class="col-green"';
		} ?>>
			<?php
			// 野菜　経過日数＞5
			// 肉　経過日数＞2　警告
			if($stuff['Stuff']['cat_id']==='1' && $stuff['Stuff']['pastdates']>10) {
				echo '😭 ';
			} elseif ($stuff['Stuff']['cat_id']==='1' && $stuff['Stuff']['pastdates']>7) {
				echo '😞 ';
			} elseif ($stuff['Stuff']['cat_id']==='1' && $stuff['Stuff']['pastdates']>4) {
				echo '😑 ';
			} elseif ($stuff['Stuff']['cat_id']==='2' && $stuff['Stuff']['pastdates']>5) {
				echo '😭 ';
			} elseif ($stuff['Stuff']['cat_id']==='2' && $stuff['Stuff']['pastdates']>2) {
				echo '😞 ';
			} elseif ($stuff['Stuff']['cat_id']==='2' && $stuff['Stuff']['pastdates']>0) {
				echo '😑 ';
			} elseif ($stuff['Stuff']['pastdates']>24) {
				echo '😭 ';
			} elseif ($stuff['Stuff']['pastdates']>14) {
				echo '😓 ';
			} elseif ($stuff['Stuff']['pastdates']>9) {
				echo '😮 ';
			} else {
				echo '😄 ';
			}
			echo h($stuff['Stuff']['pastdates']); ?>
		&nbsp;</td>
		<!--<td><?php //echo h($stuff['Stuff']['price']); ?>&nbsp;</td>-->
		<!--<td><?php //echo h($stuff['Stuff']['store']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $stuff['Stuff']['id'])); ?>
			<?php echo $this->Html->link(__('編集'), array('action' => 'edit', $stuff['Stuff']['id'])); ?>
			<?php echo $this->Form->postLink(__('消す'), array('action' => 'delete', $stuff['Stuff']['id']), array('confirm' => __('本当に %s を削除しますか？', $stuff['Detail']['name']))); ?>
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
		<li><?php echo $this->Html->link(__('買ったものを登録'), array('action' => 'add')); ?></li>
		<!--<li><?php //echo $this->Html->link(__('分類を見る'), array('controller' => 'cats', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('分類を追加'), array('controller' => 'cats', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('食材を見る'), array('controller' => 'details', 'action' => 'index')); ?> </li>-->
		<li><?php echo $this->Html->link(__('食材を追加登録'), array('controller' => 'details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('そこねを見る'), array('controller' => 'prices', 'action' => 'index')); ?> </li>
	</ul>
</div>
