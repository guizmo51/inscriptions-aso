<div class="participations form">
<?php echo $this->Form->create('Participation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Participation'); ?></legend>
	<?php
		echo $this->Form->input('evenements_id');
		echo $this->Form->input('utilisateurs_id');
		echo $this->Form->input('covoiturage');
		echo $this->Form->input('remarques');
		echo $this->Form->input('date_inscriptions');
		echo $this->Form->input('categories_id');
		echo $this->Form->input('courses_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Participation.evenements_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Participation.evenements_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Participations'), array('action' => 'index')); ?></li>
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
