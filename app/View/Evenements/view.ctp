<div class="evenements view">
<h2><?php  echo __('Evenement'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($evenement['Evenement']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($evenement['Evenement']['nom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lieu'); ?></dt>
		<dd>
			<?php echo h($evenement['Evenement']['lieu']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($evenement['Evenement']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Limite Inscript'); ?></dt>
		<dd>
			<?php echo h($evenement['Evenement']['date_limite_inscript']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remarques'); ?></dt>
		<dd>
			<?php echo h($evenement['Evenement']['remarques']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Evenement'), array('action' => 'edit', $evenement['Evenement']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Evenement'), array('action' => 'delete', $evenement['Evenement']['id']), null, __('Are you sure you want to delete # %s?', $evenement['Evenement']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Evenements'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evenement'), array('action' => 'add')); ?> </li>
	</ul>
</div>
