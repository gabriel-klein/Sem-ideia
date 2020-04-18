@component('mail::message')
<div>
	<p>
		<b>Parabéns,</b>
		<br>
		Sua conta foi criada com sucesso!
	</p>
	<p>
		Nós estaremos verificando os dados cadastrados e, em breve, você receberá um email com o resultado.
	</p>
	@component('emails.assinatura')
		Até breve!
	@endcomponent
</div>
@endcomponent