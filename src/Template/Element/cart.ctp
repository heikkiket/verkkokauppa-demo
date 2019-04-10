<h2>Ostoskori</h2>
    <table>

        <?php
        $session = $this->getRequest()->getSession();

        $user = $session->read('Auth.User');

        if ( isset($user)) { ?>
        <tr v-for="(product,key ,index) in products">
            <td><button class="button alert" type="button" value="product" @click="removeItem(key, product.id)">
                <span class="show-for-sr">Poista tuote ostoskorista</span><span aria-hidden="true"><i class="fi-trash"></i></span></button></td>
            <td><a v-bind:href="'<?= $this->Url->build(['controller' => 'Tuotteet', 'action' => 'nayta']) ?>/' + product.tuotekoodi">{{ product.tuotteet.nimi }}</a></td>
            <td>{{ product.tuotteet.hinta }} €</td>
        </tr>
        <tr><td colspan="2">Yhteensä:</td><td>{{ cartTotal }} €</td></tr>
        <?php } else {
            echo '<tr><td>Et ole kirjautunut sisään.</td></tr>';
        } ?>
    </table>
