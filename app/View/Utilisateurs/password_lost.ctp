
<div class="participations">
<?php echo $this->Form->create('Utilisateurs', array('action'=>'password_lost', 'class'=>'well')); ?>
	<fieldset><legend><?php echo "Mot de passe perdu"; ?></legend>
<div class="control-group">
  <label class="control-label" for="textinput">Email</label>
  <div class="controls">
    <input id="textinput" name="email" type="text" placeholder="email" class="input-xlarge">
    
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="textinput">Nom d'utilisateur</label>
  <div class="controls">
    <input id="textinput" name="login" type="text" placeholder="utilisateur" class="input-xlarge">
    
  </div>
</div>

<p>&nbsp;</p>

</fieldset>
<?php echo $this->Form->end(__('Regénérer mon mot de passe')); ?>
</div>