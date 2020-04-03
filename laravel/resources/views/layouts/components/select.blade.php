<div class="row">
	<div class="input-field col s12">
    @if (isset($icon))
      <i class="material-icons prefix">{{ $icon }}</i>  
    @endif

    <select id="{{$name}}" name="{{$name}}" 
      @if(!isset($required) || $required) required @endif
      class="{{ isset($class) ? $class : '' }} @error($name) invalid @enderror">
      
      <option selected disabled >{{ $textOptionDefault }}</option>
      {{ $options }}
    </select>	
    
		<label for="{{ $name }}"> {{ $label }} </label>
		@error($name)
			<span class="helper-text red-text">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
  </div>
</div>
