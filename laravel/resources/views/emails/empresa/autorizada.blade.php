@component('mail::message')
<div>
	<p>
		<b>Olá,</b>
		<br>
		Seu cadastro foi Autorizado!
	</p>
	<p>
		Agora é possível entrar no Sistema.
	</p>
	@component('emails.assinatura')
		Bem Vindo!
	@endcomponent
</div>
@endcomponent