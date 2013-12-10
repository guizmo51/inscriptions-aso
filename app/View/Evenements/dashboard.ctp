<h2>Evenements à venir</h2>
<table class="table table-striped table-bordered">
<thead>
	<tr>
		<th>Date</th>
		<th>Nom</th>
		<th>Lieu</th>
		<th>Clôture des inscriptions</th>
		<th>Remarques</th>
		<th>Inscription</th>
	</tr>
</thead>
<?php foreach($next_courses as $course) { ?>
<tr>
	<td><?php echo $course['Evenement']['date']; ?></td>
	<td><?php echo $this->Html->link(__('['.$course['Evenement']['type'].'] '.$course['Evenement']['nom']), array('controller'=>'participations', 'action' => 'voir', $course['Evenement']['id'])); ?></td>
	<td><?php echo $course['Evenement']['lieu']; ?></td>
	<td><?php echo $course['Evenement']['date_limite_inscript']; ?></td>
	<td><?php echo $course['Evenement']['remarques']; ?></td>
	<td>
		<?php


			if(date('Y-m-d')<= $course['Evenement']['date_limite_inscript']){
			if(!isset($participations[$course['Evenement']['id']])){

				$text_button="Répondre";
				
				
			}else{
				if($participations[$course['Evenement']['id']]=="oui"){
					$text_button="Je participe";
					
				}else if($participations[$course['Evenement']['id']]=="non"){
					
					$text_button="Je ne participe pas";
				}else{
					
					$text_button="Je ne sais pas";
					//nsp
				}

			}


		?>

			 <div class="btn-group">
    <button id="button_part_<?php echo $course['Evenement']['id']; ?>" class="btn dropdown-toggle" data-toggle="dropdown" data-oui-text="Je participe <span class='caret'></span>" data-non-text="Je ne participe pas <span class='caret'></span>"  data-nsp-text="Je ne sais pas <span class='caret'></span>" data-loading-text="Loading...">
      <?php echo $text_button; ?>
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
     <li ><a tabindex="-1" data-course="<?php echo $course['Evenement']['id'];?>" class="btn_rep_oui" href="#myModal" data-toggle="modal">
     	Je participe</a> </li>
     <li><a tabindex="-1"  class="btn_rep_nsp" data-course="<?php echo $course['Evenement']['id'];?>" >
     	Je ne sais pas</a></li>
     <li><a tabindex="-1" class="btn_rep_non" data-course="<?php echo $course['Evenement']['id'];?>" >
     	Je ne participe pas</a></li>
    </ul>
  </div>
<?php
}else{

	if(!empty($participations[$course['Evenement']['id']]) && $participations[$course['Evenement']['id']]=="oui"){
					$text_button="Je participe";
					
				}else if(!empty($participations[$course['Evenement']['id']]) && $participations[$course['Evenement']['id']]=="non"){
					
					$text_button="Je ne participe pas";
				}else if(!empty($participations[$course['Evenement']['id']]) && $participations[$course['Evenement']['id']]=="nsp"){
					
					$text_button="Je ne sais pas";
				}else{

					$text_button="pas de réponse";
				}
			echo $text_button;

			}

?>

		
</td>
</tr>

<?php } ?> 
</table>

<h2>Evenements passés</h2>
<table class="table table-striped table-bordered">
<thead>
	<tr>
		<th>Date</th>
		<th>Nom</th>
		<th>Lieu</th>
		<th>Clôture des inscriptions</th>
		<th>Remarques</th>
	</tr>
</thead>
<?php foreach($old_courses as $course) { ?>
<tr>
	<td><?php echo $course['Evenement']['date']; ?></td>
	<td><?php echo $this->Html->link(__('['.$course['Evenement']['type'].'] '.$course['Evenement']['nom']), array('controller'=>'participations', 'action' => 'voir', $course['Evenement']['id'])); ?></td>
	<td><?php echo $course['Evenement']['lieu']; ?></td>
	<td><?php echo $course['Evenement']['date_limite_inscript']; ?></td>
	<td><?php echo $course['Evenement']['remarques']; ?></td>
</tr>

<?php } ?> 
</table>

<?php echo $this->element('add_inscription'); ?>




