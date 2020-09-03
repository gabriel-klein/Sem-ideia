@component('mail::message')
<div>
	<p>
		<b>Olá,</b>
		<br>
    A vaga para {{ $vaga->funcao }} completou dois meses de criação!
    Por favor, se já estiver selecionado seu(s) candidato(s), desative-a.
	</p>
	<p>
		Caso já tenha desativado a vaga, desconsitere!
	</p>
	@component('emails.assinatura')
		Atenciosamente!
	@endcomponent
</div>
@endcomponent