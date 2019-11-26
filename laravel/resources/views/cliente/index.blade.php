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
                        @forelse ($users as $user)
                                <td><a href="{{ route('cliente.show', $user->userable->id) }}" data-remote="true">Currículo</a></td>
                                <td>{{$user->name}}</td>
                                <td>{{ $user->userable->idade }}</td>
                                <td>{{ $user->userable->aprendiz }}</td>
                                <td>{{ $user->userable->cel1 }}</td>
                            </tr>     
                        @empty
                            <tr><td>Não há Currículos cadastrados ainda</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
                {{ $users->links() }}
        </div>
    </div>
@endsection