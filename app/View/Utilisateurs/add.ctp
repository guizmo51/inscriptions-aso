<div class="utilisateurs form">
<?php echo $this->Form->create('Utilisateur'); ?>
	<fieldset>
		<legend><?php echo __('Add Utilisateur'); ?></legend>
	<?php

	$role=Array('admin'=>'Administrateur', 'membre'=>'Basique');

		echo $this->Form->input('lieu');
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('login');
		echo $this->Form->input('email');
		echo $this->Form->input('pwd');
		echo $this->Form->input('block');
		echo $this->Form->input('role', array('options' => $role, 'default' => 'membre'));
		echo $this->Form->input('courses_id');
		echo $this->Form->input('categories_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Utilisateurs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
