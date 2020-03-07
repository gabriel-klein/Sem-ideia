@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Função</th>
                            <th>Qº Vagas</th>
                            @emp
                                <th>Qº Candidatos</th>
                                <th>Status</th>
                            @else
                                <th>Empresa</th>
                                <th>Criação</th>
                            @endemp
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vagas as $vaga)
                            <tr>
                                <td><a href="{{ route('vagas.show', $vaga->id) }}" data-remote="true">
                                    {{ $vaga->funcao }}
                                </a></td>
                                <td>{{ $vaga->quantidade }}</td>
                                @emp
                                    <td>
                                        {{(count($vaga->clientes)) ? count($vaga->clientes) : "Não há candidatos"}}
                                    </td>
                                    <td>{{ $vaga->status }}</td>
                                    <td class="py-1">
                                        <a class="btn btn-success"  href="{{ route('vagas.edit', $vaga->id) }}">
                                            Editar
                                        </a>
                                    </td>
                                @else
                                    <td>{{ $vaga->empresa->razao_social}}</td>
                                    <td>{{ $vaga->created_at->format('d.m.Y') }}</td>
                                    <td>
                                        @if (!$vaga->clientes()->find(Auth::user()->userable->id))
                                            <form action="{{route('vagas.candidatar')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="vaga" value="{{ $vaga->id }}">
                                                <input type="hidden" name="cliente" value="{{ Auth::user()->userable->id }}">
                                                <button type="submit" class="btn btn-primary">Candidatar</button>
                                            </form>
                                        @else
                                            <form action="{{route('vagas.cancelarCandidatura')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="vaga" value="{{ $vaga->id }}">
                                                <input type="hidden" name="cliente" value="{{ Auth::user()->userable->id }}">
                                                <button type="submit" class="btn btn-danger">Cancelar candidatura</button>
                                            </form>
                                    </td>
                                    @endif
                                @endemp
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
        @emp
            <a href="{{route('vagas.create')}}">Criar uma nova vaga</a>
       @endemp
    </div>
@endsection