<h1>Soitintyypit</h1>
<table>
    <tr>
        <th>Tyyppi</th>
        <th>Toiminto</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($soitintyypit as $soitintyyppi): ?>
    <tr>
        <td>
            <?= $this->Html->link($soitintyyppi->soitintyyppi, ['action' => 'nayta', $soitintyyppi->id])?>
        </td>
        <td>
            <?= $this->Html->link('[muokkaa]', ['action' => 'muokkaa', $soitintyyppi->id])?>
        </td>
    </tr>
    <?php endforeach; ?>
    <p><?= $this->Html->link('Lisää soitintyyppi', ['action' => 'lisaa']) ?></p>
</table>
