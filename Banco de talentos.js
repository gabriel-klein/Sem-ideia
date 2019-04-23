function trabalhei()
{
  var div = document.getElementById("divResultado");
             
    div.innerHTML = "<input type='checkbox' name='operador' id='operador'/>Operador(a) de Caixa<p><input type='checkbox' name='auxiliar' id='aulixiar'/>Auxiliar de Serviços Gerais<p><input type='checkbox' name='vendedor' id='vendedor'/>Vendedor(a) <p><input type='checkbox' name='coordenador' id='coordenador'/>Coordenador(a)/Gerente de Loja<p><input type='checkbox' name='vigia' id='vigia'/>Vigia/Prevenção de perdas<p><input type='checkbox' name='estoquista' id='estoquista'/>Estoquista<p><input type='checkbox' name='baba' id='baba'/>Babá/Cuidador<p><input type='checkbox' name='estimulador' id='estimulador'/>Estimulador<p><input type='checkbox' name='cozinheiro' id='cozinheiro'/>Cozinheiro<p><input type='checkbox' name='garçom' id='garçom'/>Garçom/Garçonete<p><input type='checkbox' name='atendente' id='atendente'/>Atendente de Telemarketing<p><input type='checkbox' name='frentista' id='frentista'/>Frentista<p>Outra função? Qual? <input type'text' name='outra' id='outra' onkeypress='return somente_letra()' />";
}
function apaga()
{
  var div = document.getElementById("divResultado");
             
    div.innerHTML = "";
}
//document.getElementById("teste").style.backgroundColor = "red";


function somente_num(campo)
{
    if(event.charCode >=48 && event.charCode <=57)
  { 
       var tel = campo.value;
              if (tel.length == 0){
                  tel = '(' + tel;
                  campo.value=tel;
                  return true;              
              }
              if (tel.length == 4){
                  tel = tel + ') ';
                  campo.value=tel;
                  return true;
              }
            if (tel.length == 11){
                  tel = tel + '-';
                  campo.value=tel;
                  return true;
              }
  
  }
  else
  return false;

}

// function somente_letra()
// {
//   if((event.charCode>=65 && event.charCode <=90)||(event.charCode>=97 && event.charCode<=122))
//   {
//     return true;
//   }
//   else
//     return false;
// }
