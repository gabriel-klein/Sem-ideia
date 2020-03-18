@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar Vaga</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('vagas.store') }}">
                        @csrf
                        @include('vagas.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection