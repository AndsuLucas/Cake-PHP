<h1>Register</h1>
<?= $this->Form->create($user, ['action' => 'createUser']) ?>
	<?= $this->Form->input('username') ?>
	<?= $this->Form->input('password') ?>
	<?= $this->Form->button('Register') ?>
<?= $this->Form->end() ?>