@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Currículo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('empresa/cadastro') }}"> 
                        @csrf

        <h3 class="h3 texto" id="texto">Conhecimentos</h3><hr>

        <p><label class="control-label" for="ensino">Escolaridade:*</label>
          <select name="ensino" class="custom-select" id="ensino">
            <option selected disabled >Selecione sua Escolaridade</option>
            <option value="Superior_completo"  >Superior Completo</option>
            <option value="Superior_incompleto"  >Superior Incompleto</option>
            <option value="Médio_completo"  >Médio Completo</option>
            <option value="Médio_incompleto"  >Médio Incompleto</option>
            <option value="Fundamental_completo"  >Fundamental Completo</option>
            <option value="Fundamental_incompleto"  >Fundamental Incompleto</option>
          </select>

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

      <div class="form-group  mb-0">
          <div class="col-md-6 -md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
              </button>
          </div>  
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

