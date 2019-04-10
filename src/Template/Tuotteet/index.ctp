<div class="grid-x main-heading">
    <div class="cell small-6"><h1>Tuotteet</h1></div>
    <div class="cell small-4"><?php
echo $this->Form->create(null, ['url' => ['controller' => 'Tuotteet', 'action' => 'etsi'], 'method' => 'get']);
echo $this->Form->Control('Hakusana', ['placeholder' => 'Nimi tai tuotekoodi']); ?>
<input type="hidden" name="Orderby" value="nimi"></div>
    <div class="cell small-2"><?php
echo $this->Form->Submit('Etsi tuotetta', ['class' => 'button searchsubmit']);
echo $this->Form->end(); ?></div>
</div>
<div class="cell small-2"><?= $this->Html->link('Lisää tuote', ['action' => 'lisaa']) ?></div>
<p>Jotta tuotteita voi ostella, pitää kirjautua ensiksi sisään.</p>

<?php
echo $this->element('products');
?>