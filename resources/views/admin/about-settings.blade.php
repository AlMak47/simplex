@extends('home')

@section('contents')
<div class="uk-container">
		<h2 class="uk-heading-line"><span>About Settings</span></h2>
		@if(session('success'))
		<div class="uk-alert uk-alert-success">
			{{session('success')}}
		</div>
		@endif
		<div>
			<!-- presentation -->
			<h3>Presentation</h3>
			{!!Form::open(['url'=>'about-settings/presentation'])!!}
			{!!Form::hidden('titre','presentation')!!}
			{!!Form::textarea('contenu','',['class'=>'uk-textarea uk-margin-small','placeholder'=>'Ajoutez une presentation de SIMPLEX'])!!}
			{!!Form::submit('Envoyer',['class'=>'uk-button uk-button-default'])!!}
			{!!Form::close()!!}
		</div>
		<hr class="uk-divider-small">
		<div>
			<!-- historique -->
			<h3>Historique</h3>
			{!!Form::open(['url'=>'about-settings/historique'])!!}
			{!!Form::hidden('titre','historique')!!}
			{!!Form::textarea('contenu','',['class'=>'uk-textarea uk-margin-small','placeholder'=>'Historique de SIMPLEX'])!!}
			{!!Form::submit('Envoyer',['class'=>'uk-button uk-button-default'])!!}
			{!!Form::close()!!}
		</div>
		<hr class="uk-divider-small">
		<div>
			<!-- projet -->
			{!!Form::open(['url'=>'about-settings/project'])!!}
			{!!Form::hidden('titre','projet')!!}
			{!!Form::textarea('contenu','',['class'=>'uk-textarea uk-margin-small','placeholder'=>'Projet de SIMPLEX'])!!}
			{!!Form::submit('Envoyer',['class'=>'uk-button uk-button-default'])!!}
			{!!Form::close()!!}
		</div>
		<hr class="uk-divider-small">
		<div>
			<!-- Equipe -->

		</div>
	</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$(function() {
		// jquery goes here
	});
</script>

@endsection