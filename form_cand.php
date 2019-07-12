<?php include './Modules/header.php'; ?>
<center><h1 class="h1 texto">Cadastro Do Cliente</h1><hr id="topo"></center><br><br>
  <form class="container-fluid" method="POST" action="cadastrar_candi.php" name="form" ng-controller="envio" autocomplete="off">
    <div class="row">
      <div class="col-md-6 shadow-sm">
        <h3 class="h3 texto">Informações Pessoais</h3><hr>
        <div class="form-group">
          <label for="nome">Nome:*</label><!-- ng-model="i_nome" -->
          <input type="text" class="form-control" id="nome" placeholder="Nome Completo" required name="nome"  size=40 value="<?php echo (isset($nome))? $nome: ""; ?>" /> 
          <!-- onkeypress="return somente_letra()" -->
          <p class="alert alert-danger mt-2" ng-show="<?php echo (isset($nome_r))? $nome_r: "false"; ?>"> <?php echo (isset($nome_erro))? $nome_erro: ""; ?></p>
        </div>

        <div class="form-group">
          <label for="email">Email:*</label>
          <input type="email" class="form-control" id="email" placeholder="Ex: gabriel.silva@gmail.com" required name="email" maxlength=40 value="<?php echo (isset($email))? $email: ""; ?>" />
          <p class="alert alert-danger mt-2" ng-show="<?php echo (isset($email_r))? $email_r: "false"; ?>"><?php echo (isset($email_erro))? $email_erro: ""; ?></p>
        </div>
        <div class="form-group">
          <label for="tel1">Celular 1*:</label>
          <input type="text" name="tel" class="form-control" id="tel1" placeholder="Ex: (11) 9 9999-8888" pattern=".{15}" title="(011) 9 9999-8888" required maxlength=15 onkeypress="return somente_num(this)" value="<?php echo (isset($tel1))? $tel1: ""; ?>" />
          <p class="alert alert-danger mt-2" ng-show="<?php echo (isset($tel1_r))? $tel1_r: "false"; ?>"><?php echo (isset($tel1_erro))? $tel1_erro: ""; ?></p>
        </div>

        <div class="form-group">
          <label for="tel2">Celular 2:</label>
          <input type="text" name="tel2" class="form-control" id="tel2" placeholder="Ex: (011) 9 9999-8888" pattern=".{15}" title="(011) 9 9999-8888"  maxlength=15 onkeypress="return somente_num(this)" ng-model="i_tel2"/>
          <p class="alert alert-danger" ng-show="form.tel2.$invalid">Insira um telefone válido</p>
        </div>
      </div>
      <div class="col-md-6 shadow-sm">
        <h3 class="h3 texto">Conhecimentos</h3><hr>

        <p><label class="control-label" for="ensino">Escolaridade:*</label>
          <select name="ensino" class="custom-select" id="ensino">
            <option <?php echo (!isset($esc))? "selected":""; ?> disabled >Selecione sua Escolaridade</option>
            <option value="Superior_com" <?php echo (isset($esc) && $esc == "Superior_com")? "selected":""; ?> >Superior Completo</option>
            <option value="Superior_inc" <?php echo (isset($esc) && $esc == "Superior_inc")? "selected":""; ?> >Superior Incompleto</option>
            <option value="Médio_com" <?php echo (isset($esc) && $esc == "Médio_com")? "selected":""; ?> >Médio Completo</option>
            <option value="Médio_inc" <?php echo (isset($esc) && $esc == "Médio_inc")? "selected":""; ?> >Médio Incompleto</option>
            <option value="Fundamental_com" <?php echo (isset($esc) && $esc == "Fundamental_com")? "selected":""; ?> >Fundamental Completo</option>
            <option value="Fundamental_inc" <?php echo (isset($esc) && $esc == "Fundamental_inc")? "selected":""; ?> >Fundamental Incompleto</option>
          </select>
           <p class="alert alert-danger" ng-show="<?php echo (isset($esc_r))? $esc_r: "false"; ?>"><?php echo (isset($esc_erro))? $esc_erro: ""; ?></p>
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
      <div class="col-md-12 mx-auto shadow-sm">
        <h3 class="h3 text-center texto">Informações adicionais</h3> <hr>
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
        <p><input type="submit" value="Enviar" class="btn btn-primary" /></p>
      </div><!--  ng-disabled="(form.nome.$pristine || form.email.$pristine || form.tel.$pristine || form.ensino.$pristine )"  -->
    </div>
  </form>

  <div class="modal" id="info">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <center>
          <div class="modal-header">
            <h4 class="modal-title"><?php echo $info_tit ?></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        <!-- Modal body -->
        
          <div class="modal-body">
            <i class="<?php echo $info_ico ?> fa-10x mb-1" style="<?php echo $info_css ?>" ></i>
            <h4 class="h4 mt-2"><?php echo $info_text ?></h4>
          </div>
        </center>
      </div>
    </div>
  </div>
 <?php include './Modules/footer.php'; ?>
