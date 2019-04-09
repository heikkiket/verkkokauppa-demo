<table id="tuotteet">
    <tr>
        <th><?= $this->Link->makeOrder('Nimi', $asc) ?></th>
        <th><?= $this->Link->makeOrder('Hinta', $asc) ?></a></th>
        <th>Toiminto</th>

    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($tuotteet as $tuote): ?>
        <tr>
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
                <?= $this->Html->link('Muokkaa', ['action' => 'muokkaa', $tuote->tuotekoodi], ['class' => 'button'])?>
                <?php } ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>