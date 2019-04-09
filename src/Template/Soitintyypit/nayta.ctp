<h1><?= h($soitintyyppi->soitintyyppi) ?></h1>
<?php echo $soitintyyppi; echo "<br>"; ?>
<ul>
<?php foreach($soittimet as $soitin): ?>
    <li><?= $soitin->nimi ?></li>
<?php endforeach; ?>
</ul>
<p><?= $this->Html->link('Muokkaa', ['action' => 'muokkaa', $soitintyyppi->id]) ?></p>
<p><?= $this->Html->link('Kaikki soitintyypit', ['action' => 'index']) ?></p>