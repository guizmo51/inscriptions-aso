
<h1><?php echo $text_intro; ?></h1>

<p>&nbsp;</p>
<h2>Réponses à des évènements à venir</h2>
<table class="table table-striped table-bordered">
<tr>
<th>Date</th>
<th>Evenement</th>
<th>Date limite d'inscription</th>
<th>Réponse</th>
</tr>
<?php foreach($participe_a_venir as $avenir){ ?>

<tr>
<td><?php echo $avenir['Evenement']['date']; ?></td>
<td><?php echo $this->Html->link(__('['.$avenir['Evenement']['type'].'] '.$avenir['Evenement']['nom']), array('controller'=>'participations', 'action' => 'voir', $avenir['Evenement']['id'])); ?></td>
<td><?php echo $avenir['Evenement']['date_limite_inscript']; ?></td>
<td>
		<?php


				
			
				if($avenir['Participation']['rep']=="oui"){
					$text_button="Je participe (".$avenir['Category']['nom']." / ".$avenir['Course']['nom']. " )";
					
				}else if($avenir['Participation']['rep']=="non"){
					
					$text_button="Je ne participe pas";
				}else{
					
					$text_button="Je ne sais pas";
					//nsp
				}

			

		?>
		<?php

				$cate_id=$avenir['Utilisateur']['categories_id'];
				$course_id=$avenir['Utilisateur']['courses_id'];

			if(isset($avenir['Participation']['categories_id'])){
				$cate_id=$avenir['Participation']['categories_id'];

			}
			if(isset($avenir['Participation']['courses_id'])){
				$course_id=$avenir['Participation']['courses_id'];
				
			}
		?>

			 <div class="btn-group">
    <button data-rep-cate="<?php echo $cate_id; ?>" data-rep-circuit="<?php echo $course_id; ?>" data-rep-part="<?php echo $avenir['Participation']; ?>"  id="button_part_<?php echo $avenir['Evenement']['id']; ?>" class="btn dropdown-toggle" data-toggle="dropdown" data-oui-text="Je participe <span class='caret'></span>" data-non-text="Je ne participe pas <span class='caret'></span>"  data-nsp-text="Je ne sais pas <span class='caret'></span>" data-loading-text="Loading...">
      <?php echo $text_button; ?>
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
     <li ><a tabindex="-1" data-course="<?php echo $avenir['Evenement']['id']?>" class="edit_btn_rep_oui" href="#myModal" data-toggle="modal">
     	Je participe</a> </li>
     <li><a tabindex="-1"  class="btn_rep_nsp" data-course="<?php echo $avenir['Evenement']['id']['id'];?>" >
     	Je ne sais pas</a></li>
     <li><a tabindex="-1" class="btn_rep_non" data-course="<?php echo $avenir['Evenement']['id']['id'];?>" >
     	Je ne participe pas</a></li>
    </ul>
  </div>


		
</td>
</tr>

<?php } ?>
</table>



<h2>Réponses à des évènements passés</h2>
<p>&nbsp;</p>

<?php echo $this->element('tab_part_passees', $part_passees); ?>



<?php echo $this->element('edit_inscription'); ?>

