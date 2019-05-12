//$(document).foundation
'use strict';

const url = '/verkkokauppa-demo/ostoskorituotteet';
const format = '.json'

const app = new Vue({
    el: '#cart',
    data: {
        products: []
    },
    created() {
        this.updateList();
    },
    computed : {
        cartTotal () {
            return this.products.reduce((sum, product) => {
                return sum + product.tuotteet.hinta
            }, 0);
        }
    },
    methods: {
        removeItem: function(index, id) {
            this.products.splice(index, 1);

            deleteData(url, id)
                .then(response => response.json())
                .then(response => console.log('Success:', response));
        },
        updateList: function () {
            console.log('fetching from: ' + url + format)
            fetch(url + format)
                .then(response => response.json())
                .then(json => {
                    console.log(json);
                    this.products = json;
                    this.test = 'test';
                });
        }
    }
});

function addToCart(tuotekoodi, nimi, hinta) {
    console.log(tuotekoodi);
    postData(url + format, {tuotekoodi: tuotekoodi})
        .then(data => {
            console.log(JSON.stringify(data));
            app.products.push({tuotekoodi: tuotekoodi, tuotteet: {nimi: nimi, hinta: hinta}});

        })
        .catch(error => console.log(error));
}

function postData(url = ``, data = {}) {
    console.log('url:' + url, 'data_ ', data);
    // Default options are marked with *
    return fetch(url, {
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        credentials: 'same-origin', // include, *same-origin, omit
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data) // body data type must match "Content-Type" header
    })
        .then(response => response.json())
        .then(response => console.log('Success:', response));
}

function deleteData(url = ``, id='') {

    return fetch(url + '/' + id + format, {
        method: 'DELETE', // *GET, POST, PUT, DELETE, etc.
        credentials: 'same-origin', // include, *same-origin, omit
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(response => console.log('Success:', response)
        .catch(function(err) {
            console.log(err);
        })
    );
}