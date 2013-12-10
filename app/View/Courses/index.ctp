<div class="courses index">
	<h2><?php echo __('Circuits'); ?></h2>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
	<?php foreach ($courses as $course): ?>
	<tr>
		<td><?php echo h($course['Course']['id']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['nom']); ?>&nbsp;</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $course['Course']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $course['Course']['id']), null, __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	