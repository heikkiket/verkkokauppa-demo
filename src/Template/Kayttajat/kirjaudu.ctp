<h1>Kirjaudu</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('salasana') ?>
<?= $this->Form->button('Login', ['class' => 'button']) ?>
<?= $this->Form->end() ?>
