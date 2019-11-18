@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Função</th>
                            <th>Quantidade</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vagas as $vaga)
                            <tr>
                                <td><a href="{{ route('vagas.show', $vaga->id) }}" method="GET" data-remote="true">
                                    {{ $vaga->funcao }}
                                </a></td>
                                <td>{{ $vaga->quantidade }}</td>
                                <td>{{ $vaga->status }}</td>
                                <td class="py-1">
                                    <a class="btn btn-success"  href="{{ route('vagas.edit', $vaga->id) }}">
                                        Editar
                                    </a>
                                </td>
                            </tr>     
                        @empty
                            <tr><td>Não há vagas cadastradas ainda</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="row text-center">
                    {{ $vagas->links() }}
                </div>
                <a href="{{route('vagas.create')}}">Criar uma nova vaga</a>
            </div>
        </div>
    </div>
@endsection