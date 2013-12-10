<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un circuit'); ?></legend>
	<?php
		echo $this->Form->input('nom');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

