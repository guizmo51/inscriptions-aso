<div class="utilisateurs view">
<h2><?php  echo __('Utilisateur'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($utilisateur['Utilisateur']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($utilisateur['Utilisateur']['nom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prenom'); ?></dt>
		<dd>
			<?php echo h($utilisateur['Utilisateur']['prenom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($utilisateur['Utilisateur']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pwd'); ?></dt>
		<dd>
			<?php echo h($utilisateur['Utilisateur']['pwd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Block'); ?></dt>
		<dd>
			<?php echo h($utilisateur['Utilisateur']['block']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Courses'); ?></dt>
		<dd>
			<?php echo $this->Html->link($utilisateur['Courses']['id'], array('controller' => 'courses', 'action' => 'view', $utilisateur['Courses']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categories'); ?></dt>
		<dd>
			<?php echo $this->Html->link($utilisateur['Categories']['id'], array('controller' => 'categories', 'action' => 'view', $utilisateur['Categories']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Utilisateur'), array('action' => 'edit', $utilisateur['Utilisateur']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Utilisateur'), array('action' => 'delete', $utilisateur['Utilisateur']['id']), null, __('Are you sure you want to delete # %s?', $utilisateur['Utilisateur']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Utilisateurs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Utilisateur'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
