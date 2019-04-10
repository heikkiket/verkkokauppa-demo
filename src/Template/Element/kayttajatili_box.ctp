<h2>Käyttäjätili</h2>
<?php

// Asetetaan käyttäjä $user-muuttujaan, jotta voidaan tehdä templateen tarvittaessa muutoksia.
$session = $this->getRequest()->getSession();

$user = $session->read('Auth.User');
if( isset($user)) { ?>

<p><span aria-hidden="true"><i class="fi-torso"> </i></span><a href="<?= $this->Url->build([
    'controller' => 'Kayttajat',
    'action' => 'edit',
    $session->read('Auth.User.id')]) ?>">
    <?=  $session->read('Auth.User.nimi') ?></a>
    <br>
    <a href="<?= $this->Url->build([
        'controller' => 'Kayttajat',
        'action' => 'kirjauduUlos'
]) ?>">Kirjaudu ulos</a>

</p>
<?php } else { ?>
    <p>Et ole kirjautunut sisään. <a href="<?=
        $this->Url->build(['controller' => 'Kayttajat', 'action' => 'kirjaudu']);
        ?>">Kirjaudu sisään.</a></p>
<?php } ?>