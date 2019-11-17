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
                            @if (Auth::user()->userable_type == "App\Empresa")
                                <th>Status</th>
                                <th>Ações</th>
                            @else
                                <th>Empresa</th>
                                <th>Criação</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vagas as $vaga)
                            <tr>
                                <td><a href="{{ route('vagas.show', $vaga->id) }}" data-remote="true">
                                    {{ $vaga->funcao }}
                                </a></td>
                                <td>{{ $vaga->quantidade }}</td>
                                @if (Auth::user()->userable_type == "App\Empresa")
                                    <td>{{ $vaga->status }}</td>
                                    <td class="py-1">
                                        <a class="btn btn-success"  href="{{ route('vagas.edit', $vaga->id) }}">
                                            Editar
                                        </a>
                                    </td>
                                @else
                                    <td>{{ $vaga->empresa->razao_social}}</td>
                                    <td>{{ $vaga->created_at->format('d.m.Y') }}</td>
                                @endif
                            </tr>     
                        @empty
                            <tr><td>Não há vagas cadastradas ainda</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
                {{ $vagas->links() }}
        </div>
        @if (Auth::user()->userable_type == "App\Empresa")
            <a href="{{route('vagas.create')}}">Criar uma nova vaga</a>
        @endif
    </div>
@endsection