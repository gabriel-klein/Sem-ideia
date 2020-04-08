<div class="row">
    <div class="col 12">
        <p for="{{$name}}">{{$texto}}</p>
        <p>
            <label for="{{$labelSim}}">
                <input type="radio" id="{{$labelSim}}" name="{{$name}}" value="Sim"
                    class="@error($name) invalid @enderror" 
                    {{ old($name) == "Sim" ? 'checked' : ($data == "Sim"? 'checked': '') }}>
                <span>Sim</span>
            </label> 
        </p>
        <p>
            <label for="{{$labelNao}}">
                <input type="radio" id="{{$labelNao}}" name="{{$name}}" value="Não"
                    class="@error($name) invalid 
                    @enderror" {{ old($name) == "Não" ? 'checked' : ($data == "Não"? 'checked': '') }}
                >
                <span>Não</span>
            </label>
        </p>
        @error($name)
            <span class="helper-text red-text">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>