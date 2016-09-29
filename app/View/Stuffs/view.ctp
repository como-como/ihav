<div class="stuffs view">
<!--<h2><?php //echo __('買ったもの（詳細）'); ?></h2>-->
	<dl>
		<!--<dt><?php //echo __('ID'); ?></dt>
		<dd>
			<?php //echo h($stuffs['Stuff']['id']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('分類'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stuffs['Cat']['cat_name'], array('controller' => 'cats', 'action' => 'view', $stuffs['Cat']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('食材名'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stuffs['Detail']['name'], array('controller' => 'details', 'action' => 'view', $stuffs['Detail']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('数量・単位'); ?></dt>
		<dd>
			<?php echo h($stuffs['Stuff']['amount'].$stuffs['Stuff']['unit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('買った日'); ?></dt>
		<dd>
			<?php echo h(str_replace('-', '/', $stuffs['Stuff']['date'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('価格'); ?></dt>
		<dd>
			<?php echo h($stuffs['Stuff']['price'].'円'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('買ったお店'); ?></dt>
		<dd>
			<?php echo h($stuffs['Stuff']['store']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<!--<h3><?php //echo __('Actions'); ?></h3>-->
	<ul>
		<li><?php echo $this->Html->link(__('編集する'), array('action' => 'edit', $stuffs['Stuff']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('削除する'), array('action' => 'delete', $stuffs['Stuff']['id']), array('confirm' => __('本当に %s を削除しますか？', $stuffs['Detail']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('買ったものを見る'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('買ったものを登録'), array('action' => 'add')); ?> </li>
		<!--<li><?php //echo $this->Html->link(__('List Cats'), array('controller' => 'cats', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Cat'), array('controller' => 'cats', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Details'), array('controller' => 'details', 'action' => 'index')); ?> </li>-->
		<li><?php echo $this->Html->link(__('食材を追加登録'), array('controller' => 'details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('そこねを見る'), array('controller' => 'prices', 'action' => 'index')); ?> </li>
	</ul>
</div>
