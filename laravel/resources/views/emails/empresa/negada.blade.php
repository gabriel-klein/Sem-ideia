@component('mail::message')
<div>
	<p>
		<b>Olá,</b>
		<br>
		Infelizmente seu cadastro foi negado!
	</p>
	<p>
		Fique tranquilo, seus dados foram deletados de nosso banco de dados.
		Com isso, se achar que foi um erro, pode tentar fazer a inscrição novamente.
	</p>
	@include('emails.assinatura')
</div>
@endcomponent