<input type="text" class="hide" name="typeUser" value="Empresa">

@input([
    'name' => 'cnpj', 
    'icon' => 'assignment', 
    'data' => @$empresa->cnpj,
    'label' => 'CNPJ',
    'class' => 'cnpjMask'
])

@input([
    'name' => 'razao_social', 
    'icon' => 'assignment', 
    'data' => @$empresa->razao_social,
    'label' => 'Razão Social'
])