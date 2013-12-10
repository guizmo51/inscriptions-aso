<div class="evenements index">
	<h2><?php echo __('Evenements'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th><?php echo $this->Paginator->sort('lieu'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('date_limite_inscript'); ?></th>
			<th><?php echo $this->Paginator->sort('remarques'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($evenements as $evenement): ?>
	<tr>
		<td><?php echo h($evenement['Evenement']['id']); ?>&nbsp;</td>
		<td><?php echo h($evenement['Evenement']['nom']); ?>&nbsp;</td>
		<td><?php echo h($evenement['Evenement']['lieu']); ?>&nbsp;</td>
		<td><?php echo h($evenement['Evenement']['date']); ?>&nbsp;</td>
		<td><?php echo h($evenement['Evenement']['date_limite_inscript']); ?>&nbsp;</td>
		<td><?php echo h($evenement['Evenement']['remarques']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $evenement['Evenement']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $evenement['Evenement']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $evenement['Evenement']['id']), null, __('Are you sure you want to delete # %s?', $evenement['Evenement']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

