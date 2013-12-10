
<div class="evenements form">
<?php echo $this->Form->create('Evenement', array('action'=>'edit','class'=>'well')); ?>
	<fieldset>
		<legend><?php echo __('Editer un évènement'); ?></legend>
	<?php
	echo $this->Form->hidden('id');
		echo $this->Form->input('nom');
		$types = array('entrainement' => 'Entrainement', 'competition' => 'Competition', 'autre'=>'Autre');
echo $this->Form->input('type', array('options' => $types, 'default' => 'entrainement'));
		echo $this->Form->input('lieu'); ?>


		<div class="input input-append date datepicker" data-date="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd">
		<label>Date de l'évènement</label>

  <input class="span2" size="16" type="text" value="<?php echo $this->data['Evenement']['date'];?>" name="data[Evenement][date]"  />
  <span class="add-on"><i class="icon-th"></i></span>
</div>
<p>&nbsp;</p>
		<div class="input input-append date datepicker"  data-date="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
		<label>Date de limite d'inscription</label>
  <input class="span2" value="<?php echo $this->data['Evenement']['date_limite_inscript'];?>" size="16" type="text" name="data[Evenement][date_limite_inscript]" />
  <span class="add-on"><i class="icon-th"></i></span>
</div>
		<?php echo $this->Form->input('remarques');

	?>
	
	</fieldset>
<?php echo $this->Form->end(__('Modifier')); ?>
</div>
