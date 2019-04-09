
<h1>Muokkaa tuotetta</h1>
<?php
echo $this->Form->create($soitintyyppi);
echo $this->Form->control('soitintyyppi');
echo $this->Form->button(__('Tallenna soitintyyppi'));
echo $this->Form->end();
?>