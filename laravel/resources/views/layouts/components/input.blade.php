<div class="row">
  <div class="input-field col s12">
    @if (isset($icon))
      <i class="material-icons prefix">{{ $icon }}</i>  
    @endif

    <input id="{{ $name }}" name="{{ $name }}" autocomplete="{{ $name }}" 
      class="{{ $class ?? '' }} @error($name) invalid @enderror" 
      type="{{ $type ?? 'text' }}"
      @if(isset($value)) value="{{ $value }}" @endif
      
      @if(isset($data)) value="{{ old($name) ?? ($data ?? '' ) }}"
      @else value="{{old($name)}}" @endif
      
       @if(isset($vueDisabled)) :disabled="!{{$vueDisabled}}" @endif></input>
    
    <label for="{{ $name }}">{{ $label }}</label>
    @error($name)
        <span class="helper-text red-text">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>   