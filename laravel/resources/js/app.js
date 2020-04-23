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
    el: '#cardForm',
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
    $(".dataMask").mask("00/00/0000");
});

$('form').submit(() => {
    $('#loader').removeClass('hide');
});

$(document).ready(() => {
    $('#loader').addClass('hide');
    
    $('.sidenav').sidenav();
    
     $('.dropdown-trigger').dropdown({
        coverTrigger: false
    });
    
    $('.tabs').tabs().click(() => {
        data.typeUser = $('.tab > a.active').text();
    });

    $('.collapsible').collapsible();

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
        format: 'dd/mm/yyyy',
        container: 'body',
        minDate: new Date('1950-01-01'),
        maxDate: new Date()
    });
    $('.tooltipped').tooltip();
    $('#tabs-swipe-demo').tabs({ 'swipeable': true });
});

$(function(){
    $('.changeCardSize ').click(function(){
    var id = this.id;
    var elemento = document.getElementById(id);

    if(elemento.className!='card sticky-action cartao large')
    elemento.classList.add('large');

    else
    elemento.classList.remove('large');
    });
});

$(function () {
  $('.animate').click(function () {
    var id = this.id;
    var janelaAltura = $(window).height() / 4;
    var janelaCompri = $(window).width() / 4;
    var janelaTop = $(window).scrollTop();
    var positionLeft = getPosicaoElemento(id).left;
    var positionTop = getPosicaoElemento(id).top;
    var top = janelaTop + janelaAltura - positionTop;
    var left = janelaCompri - positionLeft;
    var element = document.getElementById(id);
    var height = $(element).height();
    var width = $(element).width();
    $(element).animate({
      left: left + 'px',
      top: top + 'px',
      opacity: '0.0'
    }, 120);
    $('.modal').modal({
      dismissible: true,
      // Modal can be dismissed by clicking outside of the modal
      opacity: .5,
      // Opacity of modal background
      inDuration: 400,
      // Transition in duration
      outDuration: 110,
      // Transition out duration
      startingTop: '10%',
      // Starting top style attribute
      endingTop: '10%',
      // Ending top style attribute
      onCloseEnd: function onCloseEnd() {
        // Callback for Modal close
        $(element).animate({
          left: '0px',
          top: '0px',
          opacity: '1',
          height: height + 'px',
          width: width + 'px'
        }, 120);
      }
    });
  });
});

function getPosicaoElemento(elemID){
    var offsetTrail = document.getElementById(elemID);
    var offsetLeft = 0;
    var offsetTop = 0;
    while (offsetTrail) {
        offsetLeft += offsetTrail.offsetLeft;
        offsetTop += offsetTrail.offsetTop;
        offsetTrail = offsetTrail.offsetParent;
    }
    if (navigator.userAgent.indexOf("Mac") != -1 && 
        typeof document.body.leftMargin != "undefined") {
        offsetLeft += document.body.leftMargin;
        offsetTop += document.body.topMargin;
    }
    return {left:offsetLeft, top:offsetTop};
}
require('./remote');
