<table id="tuotteet">
    <tr>
        <th><?= $this->Link->makeOrder('Tuotekoodi', $asc) ?></th>
        <th><?= $this->Link->makeOrder('Nimi', $asc) ?></th>
        <th><?= $this->Link->makeOrder('Hinta', $asc) ?></a></th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($tuotteet as $tuote): ?>
        <tr>
            <td>
                <?= $tuote->tuotekoodi ?>
            </td>
            <td>
                <?= $this->Html->link($tuote->nimi, ['action' => 'nayta', $tuote->tuotekoodi])?>
            </td>
            <td>
                <?= $tuote->hinta ?> €
            </td>
            <td>

                <?php
                $session = $this->getRequest()->getSession();

                $user = $session->read('Auth.User'); ?>

                <?php if (isset($user)) { ?>
                <button class="button"
                        onclick="addToCart('<?= $tuote->tuotekoodi ?>', '<?= $tuote->nimi ?>', <?= $tuote->hinta ?>)
                        ">Lisää koriin</button>

                    <?php if ($rooli == 'admin') {
                        echo $this->Html->link('Muokkaa', ['action' => 'muokkaa', $tuote->tuotekoodi], ['class' => 'button']);
                    }
                } ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<div class="paginator">
    <ul class="pagination">
        <div class="button-group">
            <?= $this->Paginator->first('<< ' . __('first'), ['class' => 'button']) ?>
            <?= $this->Paginator->prev('< ' . __('previous'), ['class' => 'button']) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </div>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Sivu {{page}}/{{pages}}, näytetään {{current}} tuotetta. Tuotteita kaikkiaan {{count}}.')]) ?></p>
</div>