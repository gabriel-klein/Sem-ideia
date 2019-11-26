@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Vaga</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cliente.update', $cliente->id) }}">
                        @csrf
                        @method('PUT')
                        @include('auth.register')
                    </form>
                    <a href="{{ route('vagas.index') }}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection