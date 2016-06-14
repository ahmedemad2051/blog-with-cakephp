<table class='table table-border'>

	<?= $this->Html->tableHeaders(['name','role','actions']) ?>

	<?php foreach($users as $us): ?>
		<tr>
			<td><?= $us['name'] ?></td>
			<td><?= $us['role'] ?></td>
			<td>
				<?php if($us['role']=='user'): ?>
				<?= $this->Form->postLink('make admin',['controller'=>'Admins','action'=>'changeRole',$us['id']]) ?>
				<?php else: ?>
				<?= $this->Form->postLink('make user',['controller'=>'Admins','action'=>'changeRole',$us['id']]) ?>
				<?php endif; ?>
				|
				<?= $this->Form->postLink('delete',['controller'=>'Admins','action'=>'delete',$us['id']]) ?>
			</td>
		</tr>
	<?php endforeach; ?>

</table>