<div class="stuffs form">
<?php echo $this->Form->create('Stuff'); ?>
	<fieldset>
		<legend><?php echo __('買ったものを登録'); ?></legend>
	<?php
		echo $this->Form->input('cat_id', array(
			'label' => '種別'
		));
		echo $this->Form->input('detail_id', array(
			'label' => '買ったもの（<a href="../details/add" target="_blank">新しく追加</a>）'
		));
        echo $this->Form->input('date', array(
			'label' => '買った日'
		));
		echo $this->Form->input('amount', array(
			'label' => '数量',
			'class' => 'input_s'
		));
		echo $this->Form->input('unit', array(
			'label' => '単位',
			'class' => 'input_s'
		));
		echo $this->Form->input('price', array(
			'label' => '価格',
			'class' => 'input_s'
		));
		echo $this->Form->input('store', array(
			'label' => '買ったお店',
			'class' => 'input_l'
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('登録する')); ?>
</div>
<div class="actions">
	<!--<h3><?php //echo __('Actions'); ?></h3>-->
	<ul>

		<li><?php echo $this->Html->link(__('買ったものを見る'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('種別を見る'), array('controller' => 'cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('種別追加'), array('controller' => 'cats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('食材を見る'), array('controller' => 'details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('食材追加'), array('controller' => 'details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('そこねを見る'), array('controller' => 'prices', 'action' => 'index')); ?> </li>
	</ul>
</div>
