<div class="row">
  <div class="input-field col s12">
      <i class="material-icons prefix">person_outline</i>
      <input id="name" type="text" class="@error('name') invalid @enderror" name="name"
        value="{{ old('name') != "" ? old('name') : @Auth::user()->name }}" required autocomplete="name">
      <label for="name">{{ __('Name') }}</label>
      
      @error('name')
          <span class="helper-text red-text">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

  </div>
</div>
<div class="row">
  <div class="input-field col s12">
      <i class="material-icons prefix">mail_outline</i>
      <input id="email" type="email" class="@error('email') invalid @enderror" name="email" 
        value="{{ old('email') != "" ? old('email') : @Auth::user()->email }}" required autocomplete="email">
      <label for="email">{{ __('E-Mail Address') }}</label>
      
      @error('email')
          <span class="helper-text red-text">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
</div>

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
    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">lock_outline</i>
            <input id="password" type="password" class="@error('password') invalid @enderror" 
                name="password" required autocomplete="new-password" :disabled="!editPassword">
            <label for="password">{{ __('Password') }}</label>

            @error('password')
                <span class="helper-text red-text">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>   

    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">lock_outline</i>
            <input id="password-confirm" type="password" class="form-control" 
                name="password_confirmation" required autocomplete="new-password" :disabled="!editPassword">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
        </div>
    </div>
</div>