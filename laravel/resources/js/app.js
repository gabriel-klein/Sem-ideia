/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery-mask-plugin');
require('jquery-ujs');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
require('materialize-css');

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

$('form').submit(() => {
    $('#loader').removeClass('hide');
})

$(document).ready(() => {
    $('#loader').addClass('hide');
    
    $('.sidenav').sidenav();
    
    $(".dropdown-trigger").dropdown();
    
    $('.tabs').tabs().click(() => {
        data.typeUser = $('.tab > a.active').text();
    });
    
    $('select').formSelect();

    $('.datepicker').datepicker({
        i18n: {
        months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
        weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
        today: 'Hoje',
        clear: 'Limpar',
        cancel: 'Sair',
        done: 'Confirmar',
        labelMonthNext: 'Próximo mês',
        labelMonthPrev: 'Mês anterior',
        labelMonthSelect: 'Selecione um mês',
        labelYearSelect: 'Selecione um ano',
        },
        format: 'yyyy-mm-dd',
        container: 'body',
        minDate: new Date('1950-01-01')
    });

});

function myfunction(argument) {
    if(session('sucesso'))
    alert(session('sucesso'));
}

require('./remote');
