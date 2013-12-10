<h2><a href="<?php echo $this->base;?>">Tableau de bord</a> > <?php echo $event['Evenement']['nom']; ?></h2>
<?php 
if($this->Session->read('User.role')=="admin"){ echo $this->Html->link('Modifier', array('controller'=>'evenements','action'=>'edit',$event['Evenement']['id']));}
?>
<p>&nbsp;</p>
 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
         Voir les détails
        </a>

<div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
       <p>Le <?php echo $event['Evenement']['date']; ?> à <?php echo $event['Evenement']['lieu']; ?></p>
       <p> Remarques : <?php echo $event['Evenement']['remarques']; ?></p>
       <p>REPONSES => OUI : <?php echo $answer['oui']; ?> / NON  : <?php echo $answer['non']; ?> / NSP : <?php echo $answer['nsp']; ?></p>
      </div>
    </div>



<p>&nbsp;</p>


<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Identité</th>
			<th>Réponse</th>
			<th>Date réponse</th>
			<th>Catégorie / circuit</th>
			<th>Remarque</th>
			<th>Covoiturage</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($event['Participation'] as $participation){ ?>

<tr>
	<td><?php echo $utilisateurs[$participation['utilisateurs_id']]; ?> </td>
	<td><?php echo $participation['rep']; ?></td>
	<td><?php echo $participation['date_inscriptions']; ?></td>
	<td><?php

	if(isset($categories[$participation['categories_id']]) && isset($courses[$participation['courses_id']])){

		echo $categories[$participation['categories_id']]." / ".$courses[$participation['courses_id']];
	}
	  ?></td>
	<td><?php echo $participation['remarques']; ?>&nbsp;</td>
	<td><?php echo $participation['covoiturage']; ?>&nbsp;</td>
	<td>
		<?php
			if($participation['rep']=="oui"){
					$text_button="Je participe (".$categories[$participation['categories_id']]."/".$courses[$participation['courses_id']].")";
					
				}else if($participation['rep']=="non"){
					
					$text_button="Je ne participe pas";
				}else{
					
					$text_button="Je ne sais pas";
					//nsp
				}



			if((($current_user['id']==$participation['utilisateurs_id']) && ($event['Evenement']['date_limite_inscript'])>=date('Y-m-d') ) /*||  $current_user['role']=="admin" */){ ?>

	 <div class="btn-group">
    <button  class="btn dropdown-toggle" data-toggle="dropdown" data-oui-text="Je participe <span class='caret'></span>" data-non-text="Je ne participe pas <span class='caret'></span>"  data-nsp-text="Je ne sais pas <span class='caret'></span>" data-loading-text="Loading...">
      <?php echo $text_button; ?>
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
     <li ><a tabindex="-1" data-course="<?php echo $event['Evenement']['id'];?>" class="btn_rep_oui" href="#myModal" data-toggle="modal">
     	Je participe</a> </li>
     <li><a tabindex="-1"  class="btn_rep_nsp" data-course="<?php echo $event['Evenement']['id'];?>" >
     	Je ne sais pas</a></li>
     <li><a tabindex="-1" class="btn_rep_non" data-course="<?php echo $event['Evenement']['id'];?>" >
     	Je ne participe pas</a></li>
    </ul>
  </div>
  

<?php

			}
		?>
		&nbsp;

	</td>

</tr>


<?php }	?></tbody>
</table>
<?php echo $this->element('add_inscription'); ?>