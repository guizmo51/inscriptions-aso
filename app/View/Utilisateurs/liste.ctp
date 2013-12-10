<h1>Liste des utilisateurs</h1>
<table  class="table table-striped table-bordered">
<tr>
<th>
Identité
</th>
<th>
Email
</th>
<th>
Login
</th>
<th>
Etat
</th>
<th>Rôle</th>
<th>Actions</th>
</tr>

<?php foreach($utilisateurs as $utilisateur) { ?>

<tr>
<td><?php echo $utilisateur['Utilisateur']['publicname']; ?></td>
<td><?php echo $utilisateur['Utilisateur']['email']; ?></td>
<td><?php echo $utilisateur['Utilisateur']['login']; ?></td>
<td>
<?php
if($utilisateur['Utilisateur']['block']==1){
	$etat="Désactivé";
	$action="Activer";
	$id_action="2";



}else{
$etat="Activé";
$action="Désactiver";
$id_action="3";
}

?>
<div class="btn-group">
  <button class="btn dropdown-toggle" id="btn-upgrade-<?php echo $utilisateur['Utilisateur']['id']; ?>-<?php echo $id_action; ?>" data-toggle="dropdown" data-loading-text="Loading..." data-content="" >
    <?php echo $etat; ?>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="btn_ajax_user" data-user="<?php echo $utilisateur['Utilisateur']['id']; ?>" data-action="<?php echo $id_action; ?>" ><?php echo $action; ?></a></li>
  </ul>
</div>





</td>
<td>
<?php
if($utilisateur['Utilisateur']['role']=="admin"){
	$role="Admin";
	$action_role="Passer en utilisateur";
	$id_action="1";

}else{
	$role="Utilisateur";
	$action_role="Passer en admin";
	$id_action="0";
}

?>
<div class="btn-group">
  <button class="btn dropdown-toggle" id="btn-upgrade-<?php echo $utilisateur['Utilisateur']['id']; ?>-<?php echo $id_action; ?>" data-toggle="dropdown" data-content="EEE" >
    <?php echo $role; ?>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="btn_ajax_user" data-user="<?php echo $utilisateur['Utilisateur']['id']; ?>" data-action="<?php echo $id_action; ?>"><?php echo $action_role; ?></a></li>
  </ul>
</div>
</td>
<td><?php echo $this->Html->link(
    'Voir ses participations',
    array('controller' => 'participations', 'action' => 'index', $utilisateur['Utilisateur']['id'])); ?>
    &nbsp;<?php echo $this->Html->link(
    'Editer',
    array('controller' => 'utilisateurs', 'action' => 'edit', $utilisateur['Utilisateur']['id'])); ?>
    &nbsp;
    
</td>
</tr>

<?php } ?>
</table>
