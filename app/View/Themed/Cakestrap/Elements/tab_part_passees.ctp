
<table class="table table-striped table-bordered">
<tr>
<th>Date</th>
<th>Evenement</th>
<th>Réponse</th>
</tr>
<?php foreach($part_passees as $part) { ?>
<tr>
<td><?php echo $part['Evenement']['date']; ?></td>
<td><?php echo $this->Html->link(__('['.$part['Evenement']['type'].'] '.$part['Evenement']['nom']), array('controller'=>'participations', 'action' => 'voir', $part['Evenement']['id'])); ?></td>
<td>
	<?php if($part['Participation']['rep']=="oui"){
					$text_button="Je participe - ".$part['Category']['nom']." / ".$part['Course']['nom'];
					
				}else if($part['Evenement']['id']=="non"){
					
					$text_button="Je ne participe pas";
				}else{
					
					$text_button="Je ne sais pas";
					//nsp
				}
				echo $text_button;
				echo " - ";
				echo "(".$part['Participation']['date_inscriptions'].")";
 ?>

</td>
</tr>
<?php } ?>
</table>