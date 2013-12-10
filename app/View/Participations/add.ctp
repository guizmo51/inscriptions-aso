
<div class="participations form">
<?php echo $this->Form->create('Participation'); ?>
	<fieldset>
		<legend><?php echo __('Add Participation'); ?></legend>
	<?php
	debug($categories);
	$data_sess=$this->Session->read('User');
	debug($data_sess);
		// echo $this->Form->input('utilisateurs_id');
		echo $this->Form->input('covoiturage');
		echo $this->Form->input('remarques');
		// echo $this->Form->input('date_inscriptions');
		echo $this->Form->input('categories_id', array('selected'=>$data_sess['categories_id']));
		echo $this->Form->input('courses_id', array('selected'=>$data_sess['courses_id']));
		echo $this->Form->hidden('evenements_id',array('value'=>$event));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

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
