
<div class="participations">
<?php echo $this->Form->create('Utilisateurs', array('action'=>'change_password', 'class'=>'well')); ?>
	<fieldset><legend><?php echo "Changer mon mot de passe"; ?></legend>
  <p> Votre nouveau mot de passe vous sera envoyé par email</p>
<div class="control-group">
  <label class="control-label" for="textinput">Mot de passe actuel</label>
  <div class="controls">
    <input id="textinput" name="current_pwd" type="password" placeholder="mot de passe actuel" class="input-xlarge">
    
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="textinput">Nouveau mot de passe</label>
  <div class="controls">
    <input id="textinput" name="pwd" type="password" placeholder="nouveau mot de passe" class="input-xlarge">
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="passwordinput">Retapez votre nouveau mot de passe </label>
  <div class="controls">
    <input id="passwordinput" name="pwd_bis" type="password" placeholder="retapez votre nouveau mot de passe" class="input-xlarge">
    
  </div>
</div>




<div class="control-group">  
            
            
<p>&nbsp;</p>

</fieldset>
<?php echo $this->Form->end(__('Modifier mon mot de passe')); ?>
</div>