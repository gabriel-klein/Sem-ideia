<div class="row">
  <div class="input-field col s12">
    @if (isset($icon))
      <i class="material-icons prefix">{{ $icon }}</i>  
    @endif

    <textarea class="{{ $class ?? '' }} materialize-textarea @error($name) invalid @enderror" 
        id="{{$name}}" name="{{$name}}" >{{ null!==($data)? $data : old($name)}}</textarea>
        <label for="{{$name}}">{{$label}}</label>
        
        @error($name)
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>