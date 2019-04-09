<h1><?= h($tuote->nimi) ?></h1>
<ul>
    <li>Hinta: <?= h($tuote->hinta) ?>€</li>
    <li>Valmistusvuosi: <?= h($tuote->valmistusvuosi) ?></li>
    <li>Paino: <?= h($tuote->paino) ?> kg</li>
</ul>
<p><?= h($tuote->kuvaus) ?></p>
<p><?= $this->Html->link('Muokkaa', ['action' => 'muokkaa', $tuote->tuotekoodi]) ?></p>
<p><?= $this->Html->link('Kaikki tuotteet', ['action' => 'index']) ?></p>