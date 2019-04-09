<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $kayttajat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $kayttajat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $kayttajat->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Kayttajat'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="kayttajat form large-9 medium-8 columns content">
    <?= $this->Form->create($kayttajat) ?>
    <fieldset>
        <legend><?= __('Edit Kayttajat') ?></legend>
        <?php
            echo $this->Form->control('nimi');
            echo $this->Form->control('toimitusosoite');
            echo $this->Form->control('email');
            echo $this->Form->control('puhelin');
            echo $this->Form->control('salasana');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
