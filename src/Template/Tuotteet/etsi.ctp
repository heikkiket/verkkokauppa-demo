<h1>Tuotteet hakusanalla <?= h($hakusana)?></h1>

<?= $this->Html->link('<< Takaisin', ['action' => 'index'], ['class' => 'button']); ?>

<?= $this->element('products'); ?>