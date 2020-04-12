@input([
    'name' => 'name', 
    'icon' =>  'person_outline', 
    'data' => @$user->name,
    'label' => 'Nome'     
])

@input([
    'type' => 'email',
    'name' => 'email',
    'icon' => 'mail_outline',
    'data' => @$user->email,
    'label' => 'Email'
])

<div id="passwordUserForm">
    @auth
        @if (!Str::contains(url()->current(), 'admin/criar'))
            <div class="row">
                <div class="col s12 switch">
                    <label>
                        Alterar Senha?
                        <input type="checkbox" v-model="editPassword">
                        <span class="lever"></span>
                    </label>
                </div>
            </div>
        @endif
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
        'name' => 'password_confirmation',
        'icon' => 'lock_outline',
        'label' => 'Confirme a Senha',
        'vueDisabled' => 'editPassword'
    ])

</div>