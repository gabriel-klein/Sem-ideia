@input([
    'name' => 'name', 
    'icon' =>  'person_outline', 
    'data' => @Auth::user()->name,
    'label' => 'Nome'     
])

@input([
    'type' => 'email',
    'name' => 'email',
    'icon' => 'mail_outline',
    'data' => @Auth::user()->email,
    'label' => 'Email'
])



<div id="passwordUserForm">
    @auth
        <div class="row">
            <div class="col s12 switch">
                <label>
                    Alterar Senha?
                    <input type="checkbox" v-model="editPassword">
                    <span class="lever"></span>
                </label>
            </div>
        </div>
    @endauth

    @input([
        'type' => 'password',
        'name' => 'password',
        'icon' => 'lock_outline',
        'label' => 'Senha',
        'vueDisabled' => 'editPassword'
    ])

    @input([
        'type' => 'password',
        'name' => 'password-confirm',
        'icon' => 'lock_outline',
        'label' => 'Confirme a Senha',
        'vueDisabled' => 'editPassword'
    ])

</div>