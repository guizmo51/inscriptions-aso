<div class="participations view">
<h2><?php  echo __('Participation'); ?></h2>
	<dl>
		<dt><?php echo __('Evenements'); ?></dt>
		<dd>
			<?php echo $this->Html->link($participation['Evenements']['id'], array('controller' => 'evenements', 'action' => 'view', $participation['Evenements']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Utilisateurs'); ?></dt>
		<dd>
			<?php echo $this->Html->link($participation['Utilisateurs']['id'], array('controller' => 'utilisateurs', 'action' => 'view', $participation['Utilisateurs']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Covoiturage'); ?></dt>
		<dd>
			<?php echo h($participation['Participation']['covoiturage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remarques'); ?></dt>
		<dd>
			<?php echo h($participation['Participation']['remarques']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Inscriptions'); ?></dt>
		<dd>
			<?php echo h($participation['Participation']['date_inscriptions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categories'); ?></dt>
		<dd>
			<?php echo $this->Html->link($participation['Categories']['id'], array('controller' => 'categories', 'action' => 'view', $participation['Categories']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Courses'); ?></dt>
		<dd>
			<?php echo $this->Html->link($participation['Courses']['id'], array('controller' => 'courses', 'action' => 'view', $participation['Courses']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Participation'), array('action' => 'edit', $participation['Participation']['evenements_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Participation'), array('action' => 'delete', $participation['Participation']['evenements_id']), null, __('Are you sure you want to delete # %s?', $participation['Participation']['evenements_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Participations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evenements'), array('controller' => 'evenements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evenements'), array('controller' => 'evenements', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Utilisateurs'), array('controller' => 'utilisateurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Utilisateurs'), array('controller' => 'utilisateurs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
