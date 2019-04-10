<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Heikin soitinkauppa
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('foundation.min.css') ?>
    <?= $this->Html->css('app.css') ?>

    <?= $this->Html->script('vendor/vue.js') ?>
    <?= $this->Html->script('vendor/foundation.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<header><h1>Heikin soitinkauppa</h1></header>

    <div class="top-bar">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown menu>
                <li class="menu-text">
                    <?= $this->Html->link('Tuotteet', ['controller' => 'Tuotteet', 'action' => 'index']) ?>
                </li>
                <li class="menu-text">
                    <?= $this->Html->link('Soitintyypit', ['controller' => 'Soitintyypit', 'action' => 'index']) ?>
                </li>
                <li class="menu-text">
                    <?= $this->Html->link('Käyttäjätili', ['controller' => 'Kayttajat', 'action' => 'index']) ?>
                </li>
            </ul>
        </div>
        <div class="top-bar-right">
            <div id="kayttajatili_box">
                <?= $this->element('kayttajatili_box'); ?>
            </div>
        </div>
    </div>
    <?= $this->Flash->render() ?>
    <div class="grid-container grid-margin-x">
        <div class="grid-x">
            <main class="large-9">
                <?= $this->fetch('content') ?>
            </main>
            <aside class="large-3">
                <div id="cart">
                <?= $this->element('cart') ?>
                </div>
            </aside>
        </div>
    </div>
    <footer>
        2019 Heikki Ketoharju <br>
        <small>Tämän verkkokaupan tuotteet ovat aitoja syntetisaattoreita. Tuotetietojen lähde: <a href="http://www.vintagesynth.com/">Vintage Synth
                Explorer</a></small>
        <p><small>Tehty käyttäen: <a href="http://www.cakephp.org">CakePHP 7.3</a>, <a href="https://mariadb.org/">MariaDB</a>,
                <a href="https://foundation.zurb.com">Foundation 6</a>, <a href="https://vuejs.org/">Vue.js</a></small></p>
        <?= $this->Html->script('app.js', ['defer']) ?>
    </footer>
</body>
</html>
