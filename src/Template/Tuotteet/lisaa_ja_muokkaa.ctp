<h1><?= $otsikko ?></h1>
<?php

    echo $this->Form->create($tuote);

    echo $this->Form->control('nimi');
    echo $this->Form->control('tuotekoodi');
    echo $this->Form->control('hinta');
    echo $this->Form->control('valmistusvuosi');
    echo $this->Form->control('mitat');
    echo $this->Form->control('paino');
    echo $this->Form->control('soitintyyppi', ['options' => $soitintyypit]);
    echo $this->Form->control('kuvaus', ['rows' => '3']);
    echo $this->Form->button(__($otsikko), ['class' => 'button']);
    echo $this->Form->end();
?>
