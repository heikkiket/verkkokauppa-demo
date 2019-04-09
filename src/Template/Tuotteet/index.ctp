<h1>Tuotteet</h1>

<?= $this->Html->link('Lisää tuote', ['action' => 'lisaa']) ?>

<?php
echo $this->Form->create(null, ['url' => ['controller' => 'Tuotteet', 'action' => 'etsi'], 'method' => 'get']);
echo $this->Form->Control('Hakusana', ['placeholder' => 'Nimi tai tuotekoodi']); ?>
<input type="hidden" name="Orderby" value="nimi">
<?php
echo $this->Form->Submit('Etsi tuotetta', ['class' => 'button']);
echo $this->Form->end();

echo $this->element('products');
?>