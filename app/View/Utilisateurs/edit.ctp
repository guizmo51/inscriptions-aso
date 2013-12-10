<div class="utilisateurs form">
<?php echo $this->Form->create('Utilisateur'); ?>
	<fieldset>
		<legend><?php echo __('Editer Utilisateur'); ?></legend>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('login');
		echo $this->Form->input('email');
		echo $this->Form->input('courses_id');
		echo $this->Form->input('categories_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

