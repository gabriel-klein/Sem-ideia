@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Currículo</th>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Jovem Aprendiz</th>
                            <th>Telefone de contato</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @forelse ($clientes as $cliente)
                                <td><a href="{{ route('cliente.show', $cliente->id) }}" data-remote="true">Currículo</a></td>
                                <td>{{ $cliente->user->name}}</td>
                                <td>{{ $cliente->idade }}</td>
                                <td>{{ $cliente->aprendiz }}</td>
                                <td>{{ $cliente->cel1 }}</td>
                            </tr>     
                        @empty
                            <tr><td>Não há Currículos cadastrados ainda</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
                {{ $clientes->links() }}
        </div>
    </div>
@endsection