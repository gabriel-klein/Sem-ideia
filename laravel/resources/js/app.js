/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery-mask-plugin');
require('jquery-ujs');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
require('../../node_modules/materialize-css/dist/js/materialize');

window.Vue = require('vue');

var data = {
    typeUser: '',
    editPassword: true
}

const app = new Vue({
    el: '#app',
    data,
    created: () => {
        data.typeUser = $('.tab > a.active').text();
    },
    watch: {
        typeUser: () => {
            $(document).ready(() => {
                $('select').formSelect();
            });
        }
    }
});

$("#app").bind("DOMSubtreeModified", function() {
    $(".cnpjMask").mask("00.000.000/0000-00");
    $(".telMask").mask("(00) 0000-00000");
});

$(document).ready(() => {
    $(".dropdown-trigger").dropdown();
    
    $('.tabs').tabs().click(() => {
        data.typeUser = $('.tab > a.active').text();
    });

    $('select').formSelect();
});

require('./remote');