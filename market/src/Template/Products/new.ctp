<div>
	<?php if (isset($msg) && !empty($msg)): ?>
		<p><?= $msg ?></p>
	<?php endif ?>
</div>
<div>
	<?= $this->Form->create($product, ['action' => 'create']) ?>
		<?= $this->Form->input('id') ?>
		<?= $this->Form->input('name') ?>
		<?= $this->Form->input('price') ?>
		<?= $this->Form->textarea('description') ?>
		<?= $this->Form->button('Save') ?>
	<?= $this->Form->end() ?>	
</div>