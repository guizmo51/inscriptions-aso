
<div class="participations">
<?php echo $this->Form->create('Utilisateurs', array('action'=>'login', 'class'=>'well')); ?>
	<fieldset><legend><?php echo "Connexion"; ?></legend>
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

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="passwordinput">Mot de passe : </label>
  <div class="controls">
    <input id="passwordinput" name="pwd" type="password" placeholder="mot de passe" class="input-xlarge">
    
  </div>
</div>




<div class="control-group">  
            
            <div class="controls">  
              <label class="checkbox_group">  
                <input type="checkbox" id="checkbox_group" name="stay_con" id="optionsCheckbox" value="option1">  
                Cochez cette case si vous souhaitez rester connecté
              </label>  
            </div>  
          </div>  
<p>&nbsp;</p>
<?php echo $this->Html->link('Mot de passe perdu', '/utilisateurs/password_lost', array('class' => 'button'));
 ?>
 <p>&nbsp;</p>
</fieldset>
<?php echo $this->Form->end(__('Connexion')); ?>
</div>