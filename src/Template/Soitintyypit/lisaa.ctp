<h1>Lisää soitintyyppi</h1>
<?php
    echo $this->Form->create($soitintyyppi);
    // Hard code the user for now.
    echo $this->Form->control('soitintyyppi');
    echo $this->Form->button(__('Lisää soitintyyppi'));
    echo $this->Form->end();
?>
