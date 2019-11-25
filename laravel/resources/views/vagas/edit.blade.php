@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Vaga</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('vagas.update', $vaga->id) }}">
                        @csrf
                        @method('PUT')
                        @include('vagas.form')
                    </form>
                    <a href="{{ route('vagas.index') }}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection