<div class="row">
  <div class="input-field col s12">
    @if (isset($icon))
      <i class="material-icons prefix">{{ $icon }}</i>  
    @endif

    <input id="{{ $name }}" name="{{ $name }}" autocomplete="{{ $name }}" 
      class="{{ isset($class) ?? $class }} @error($name) invalid @enderror" 
      type="{{ isset($type) ? $type : 'text' }}"
      @if(isset($value)) value="{{ $value }}" @endif
      @if(isset($data)) value="{{ old($name) ? old($name) : (isset($data) ?? $data) }}" @endif
      @if(!isset($required) || $required) required @endif
      @if(isset($vueDisabled)) :disabled="!{{$vueDisabled}}" @endif>
    
    <label for="{{ $name }}">{{ $label }}</label>
    @error($name)
        <span class="helper-text red-text">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>   