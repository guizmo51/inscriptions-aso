<?php echo $this->Form->create('Utilisateur', array('class'=>'well')); ?>
	<fieldset>
		<legend><?php echo "Demande d'accès"; ?></legend>
	

<?php
echo $this->Form->input('nom', array('label'=>'Nom', 'placeholder'=>'nom', 'id'=>'InputAddNom'));
echo $this->Form->input('prenom', array('label'=>'Prénom','placeholder'=>'prénom','id'=>'InputAddPrenom'));
echo $this->Form->input('login', array('label'=>'Login (prenom.nom)','placeholder'=>'login','id'=>'InputAddLogin'));
echo $this->Form->input('email', array('label'=>'Email','placeholder'=>'email'));
echo $this->Form->input('categories_id', array('label'=>'Catégorie (défaut)'));
echo $this->Form->input('courses_id', array('label'=>'Circuit (défaut)'));	
?>
	</fieldset>
	<?php echo $this->Form->submit('Envoyer la demande',array('id'=>'submit_button')); ?>

<?php echo $this->Form->end(); ?>