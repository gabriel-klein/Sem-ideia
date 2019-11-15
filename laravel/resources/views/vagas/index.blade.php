@foreach ($vagas as $vaga)
    <p>{{ $vaga->descricao }}</p>
    <p>{{ $vaga->status }}</p>    
@endforeach
{{ $vagas->links() }}