<div class="utilisateurs index">
	<h2><?php echo __('Utilisateurs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th><?php echo $this->Paginator->sort('prenom'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('pwd'); ?></th>
			<th><?php echo $this->Paginator->sort('block'); ?></th>
			<th><?php echo $this->Paginator->sort('courses_id'); ?></th>
			<th><?php echo $this->Paginator->sort('categories_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($utilisateurs as $utilisateur): ?>
	<tr>
		<td><?php echo h($utilisateur['Utilisateur']['id']); ?>&nbsp;</td>
		<td><?php echo h($utilisateur['Utilisateur']['nom']); ?>&nbsp;</td>
		<td><?php echo h($utilisateur['Utilisateur']['prenom']); ?>&nbsp;</td>
		<td><?php echo h($utilisateur['Utilisateur']['email']); ?>&nbsp;</td>
		<td><?php echo h($utilisateur['Utilisateur']['pwd']); ?>&nbsp;</td>
		<td><?php echo h($utilisateur['Utilisateur']['block']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($utilisateur['Courses']['id'], array('controller' => 'courses', 'action' => 'view', $utilisateur['Courses']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($utilisateur['Categories']['id'], array('controller' => 'categories', 'action' => 'view', $utilisateur['Categories']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $utilisateur['Utilisateur']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $utilisateur['Utilisateur']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $utilisateur['Utilisateur']['id']), null, __('Are you sure you want to delete # %s?', $utilisateur['Utilisateur']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Utilisateur'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
