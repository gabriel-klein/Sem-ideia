@component('mail::message')
	<div>
		<p><b>Olá!</b></p>
		<p>
			A Empresa <b>{{ $empresa->user->name }}</b> se cadastou! <br>
			Verifique-a para que, em breve, ela possa estar gerando empregos!
		</p>
		@component('mail::button', ['url' => route('home'), 'color' => 'primary'])
				Verificar
		@endcomponent
		@include('emails.assinatura')
	</div>
@endcomponent