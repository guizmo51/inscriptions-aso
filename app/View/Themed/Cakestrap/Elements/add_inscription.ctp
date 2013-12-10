<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<button class="close" data-dismiss="modal">×</button>
<?php echo $this->Form->create('Participation',array('class'=>'well')); ?>
	<fieldset>
		<legend><?php echo "Je participe !" ?></legend>
	<?php

	$data_sess=$this->Session->read('User');




		echo $this->Form->input('categories_id', array('label'=>'Catégorie','selected'=>$data_sess['categories_id']));
		echo $this->Form->input('courses_id', array('label'=>'Circuit','selected'=>$data_sess['courses_id']));	
		echo $this->Form->input('remarques', array('placeholder'=>'Remarques'));
		echo $this->Form->input('covoiturage', array('label'=>'Dem. / prop de covoiturage', 'placeholder'=>'Covoiturage'));
		
		
		
		echo $this->Form->hidden('evenements_id');
	?>
	</fieldset>
	<!--<button id="submit_button">Valider</button>-->
	<?php echo $this->Form->submit('Inscription',array('id'=>'submit_button')); ?>

<?php echo $this->Form->end(); ?>
</div>