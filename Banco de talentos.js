function trabalhei()
{
	var div = document.getElementById("divResultado");
             
    div.innerHTML = "<input type='checkbox' name='operador' id='operador'/>Operador(a) de Caixa<p><input type='checkbox' name='auxiliar' id='aulixiar'/>Auxiliar de Serviços Gerais<p><input type='checkbox' name='vendedor' id='vendedor'/>Vendedor(a) <p><input type='checkbox' name='coordenador' id='coordenador'/>Coordenador(a)/Gerente de Loja<p><input type='checkbox' name='vigia' id='vigia'/>Vigia/Prevenção de perdas<p><input type='checkbox' name='estoquista' id='estoquista'/>Estoquista<p><input type='checkbox' name='baba' id='baba'/>Babá/Cuidador<p><input type='checkbox' name='estimulador' id='estimulador'/>Estimulador<p><input type='checkbox' name='cozinheiro' id='cozinheiro'/>Cozinheiro<p><input type='checkbox' name='garçom' id='garçom'/>Garçom/Garçonete<p><input type='checkbox' name='atendente' id='atendente'/>Atendente de Telemarketing<p><input type='checkbox' name='frentista' id='frentista'/>Frentista<p>Outra função? Qual? <input type'text' name='outra' id='outra' />";
}
function apaga()
{
	var div = document.getElementById("divResultado");
             
    div.innerHTML = "";
}
//document.getElementById("teste").style.backgroundColor = "red";

function mascaratel(campoTel){
              var tel = campoTel.value;
              if (tel.length == 1){
                  tel = '(' + tel;
                  document.forms[0].tel.value = tel;
      return true;              
              }
              if (tel.length == 4){
                  tel = tel + ')';
                  document.forms[0].tel.value = tel;
                  return true;
              }
	      if (tel.length == 10){
                  tel = tel + '-';
                  document.forms[0].tel.value = tel;
                  return true;
              }
         }
