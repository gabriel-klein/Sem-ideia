<!DOCTYPE html>
<html>
<?php include 'database.php'; ?>
<head>
  <title>Banco de talentos</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="Banco de talentos.js" ></script>
</head>
<body class="container-fluid" ng-app="app">
  <h2 class="h2">O que é o Banco de Talentos? </h2>
  <pre>É uma iniciativa do setor de Ação
   Comunitária e Pastoral do Unilasalle-RJ que visa criar uma ponte entre
   os moradores da região, ajudando-os a se reinserir no mercado de trabalho,
   e os comerciantes facilitando o processo de seleção de novos colaboradores.
   Para se inscrever basta preencher os dados abaixo e entregar na Ação comunitária.</pre>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" name="form" ng-controller="envio">
    <div class="row">
      <div class="col-md-6 shadow-sm">
        <h3 class="h3">Informações Pessoais</h3><hr>
        <div class="form-group">
          <label for="nome">Nome:*</label><!-- ng-model="i_nome" -->
          <input type="text" class="form-control" id="nome" placeholder="Nome Completo" required name="nome" size=40 
          value="<?php echo $nome ?>" />
          <p class="alert alert-danger mt-2" ng-show="<?php echo $nome_r; ?>"> <?php echo $nome_erro; ?></p>
          <!-- onkeypress="return somente_letra()" -->
        </div>

        <div class="form-group">
          <label for="email">Email:*</label>
          <input type="email" class="form-control" id="email" placeholder="Ex: gabriel.silva@gmail.com" required name="email" maxlength=40 value="<?php echo $email ?>" />
          <p class="alert alert-danger mt-2" ng-show="<?php echo $email_r ?>"><?php echo $email_erro ?></p>
        </div>
        <div class="form-group">
          <label for="tel1">Telefone 1*:</label>
          <input type="text" name="tel" class="form-control" id="tel1" placeholder="Ex: (011) 9 9999-8888" pattern=".{16}" title="(011) 9 9999-8888" required maxlength=16 onkeypress="return somente_num(this)" value="<?php echo $tel1 ?>" />
          <p class="alert alert-danger mt-2" ng-show="<?php echo $tel1_r ?>"><?php echo $tel1_erro ?></p>
        </div>

        <div class="form-group">
          <label for="tel2">Telefone 2:</label>
          <input type="text" name="tel2" class="form-control" id="tel2" placeholder="Ex: (011) 9 9999-8888" pattern=".{16}" title="(011) 9 9999-8888"  maxlength=16 onkeypress="return somente_num(this)" ng-model="i_tel2"/>
          <p class="alert alert-danger" ng-show="form.tel2.$invalid">Insira um telefone válido</p>
        </div>
      </div>
      <div class="col-md-6 shadow-sm">
        <h3 class="h3">Conhecimentos</h3><hr>

        <p><label class="control-label" for="ensino">Escolaridade:*</label>
          <select name="ensino" class="custom-select" id="ensino">
            <option value="null" selected disabled >Selecione sua Escolaridade</option>
            <option value="Superior_com">Superior Completo</option>
            <option value="Superior_inc">Superior Incompleto</option>
            <option value="Médio_com">Médio Completo</option>
            <option value="Médio_inc">Médio Incompleto</option>
            <option value="Fundamental_com">Fundamental Completo</option>
            <option value="Fundamental_inc">Fundamental Incompleto</option>
          </select>
        </p>

        <p>Excel:
          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="excel_Básico" name="excel" value="Básico" />
            <label class="custom-control-label" for="excel_Básico">Básico</label>
          </div>

          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="excel_Intermediário" name="excel" value="Intermediário" />
            <label class="custom-control-label" for="excel_Intermediário">Intermediário</label>
          </div>

          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="excel_Avançado" name="excel" value="Avançado" />
            <label class="custom-control-label" for="excel_Avançado">Avançado</label>
          </div>
        </p>

        <p>Word:
          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="word_Básico" name="word" value="Básico" />
            <label class="custom-control-label" for="word_Básico">Básico</label>
          </div>

          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="word_Intermediário" name="word" value="Intermediário" />
            <label class="custom-control-label" for="word_Intermediário">Intermediário</label>
          </div>

          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="word_Avançado" name="word" value="Avançado" />
            <label class="custom-control-label" for="word_Avançado">Avançado</label>
          </div>
        </p>

        <p>Inglês:
          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="ingles_Básico" name="ingles" value="Básico" />
            <label class="custom-control-label" for="ingles_Básico">Básico</label>
          </div>

          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="ingles_Intermediário" name="ingles" value="Intermediário" />
            <label class="custom-control-label" for="ingles_Intermediário">Intermediário</label>
          </div>

          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="ingles_Avançado" name="ingles" value="Avançado" />
            <label class="custom-control-label" for="ingles_Avançado">Avançado</label>
          </div>
        </p>
     </div>
   </div><br>
    <div class="row">
      <div class="col-md-6 shadow-sm">
        <h3 class="h3">Informações adicionais</h3> <hr>
        <p>Horário disponível:
          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="Diurno" name="horario" value="Diurno" />
            <label class="custom-control-label" for="Diurno">Diurno</label>
          </div>  
          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="Noturno" name="horario" value="Noturno" />
            <label class="custom-control-label" for="Noturno">Noturno</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="Indiferente" name="horario" value="Indiferente" />
            <label class="custom-control-label" for="Indiferente">Indiferente</label>
          </div>
        </p>
      
        <p>Já trabalhou antes ?:  
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="i_trab" name="trab" ng-model="trab" ng-click="troca()" />
            <label class="custom-control-label" for="i_trab"> {{op}} </label>
          </div>       
        </p>

        <div ng-if="trab">
          <p>Selecione suas experiências anteriores:</p>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="operador" name="operador" />
            <label class="custom-control-label" for="operador">Operador(a) de Caixa</label>
          </div>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="aulixiar" name="aulixiar" />
            <label class="custom-control-label" for="aulixiar">Auxiliar de Serviços Gerais</label>
          </div>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="vendedor" name="vendedor" />
            <label class="custom-control-label" for="vendedor">Vendedor(a)</label>
          </div>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="coordenador" name="coordenador" />
            <label class="custom-control-label" for="coordenador">Coordenador(a)/Gerente de Loja</label>
          </div>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="vigia" name="vigia" />
            <label class="custom-control-label" for="vigia">Vigia/Prevenção de perdas</label>
          </div>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="estoquista" name="estoquista" />
            <label class="custom-control-label" for="estoquista">Estoquista</label>
          </div>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="baba" name="baba" />
            <label class="custom-control-label" for="baba">Babá/Cuidador</label>
          </div>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="estimulador" name="estimulador" />
            <label class="custom-control-label" for="estimulador">Estimulador</label>
          </div>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="cozinheiro" name="cozinheiro" />
            <label class="custom-control-label" for="cozinheiro">Cozinheiro</label>
          </div>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="garçom" name="garçom" />
            <label class="custom-control-label" for="garçom">Garçom/Garçonete</label>
          </div>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="atendente" name="atendente" />
            <label class="custom-control-label" for="atendente">Atendente de Telemarketing</label>
          </div>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="frentista" name="frentista" />
            <label class="custom-control-label" for="frentista">Frentista</label>
          </div>  
          <div class="form-group form-inline">
            <label for="outra">Outra função? Qual? </label>
            <input type="text" class="form-control m-md-3" id="outra" name="outra" onkeypress="return somente_letra()" />
          </div>
          <!--<input type="text" name='outra' id='outra' onkeypress='return somente_letra()' /> -->
        </div>    

        <p>Tem entre 14 e 24 anos e tenha interesse em participar do Programa jovem Aprendiz? 
          <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="jovem_sim" name="jovem" value="Sim"/>
            <label class="custom-control-label" for="jovem_sim">Sim</label>
          </div>   
           <div class="custom-control custom-radio custom-control-inline col-sm-auto">
            <input type="radio" class="custom-control-input" id="jovem_não" name="jovem" value="Não" />
            <label class="custom-control-label" for="jovem_não">Não</label>
          </div>   
        </p>
      </div><!--  ng-disabled="(form.nome.$pristine || form.email.$pristine || form.tel.$pristine || form.ensino.$pristine )"  -->
      <p><input type="submit" value="Enviar" class="btn btn-primary"/></p>
    </div>
  </form>
</body>
</html>
