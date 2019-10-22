@extends('home')

@section('contents')
<div class="uk-container">
		<h2 class="uk-heading-line"><span>Ajouter une Question</span></h2>
	<!-- form add -->
	{!! Form::open(['url'=>'admin/add-question']) !!}
		@if($errors->has('intitule')):<span class="uk-alert-danger uk-margin-bottom"> {{$errors->first('intitule')}} </span>@endif
	    {!!Form::text('intitule','',['class'=>'uk-input uk-margin-small uk-margin-top','placeholder'=>'Intitule de la question'])!!}
	    @if($errors->has('reponse')):<span class="uk-alert-danger uk-margin-bottom"> {{$errors->first('reponse')}} </span>@endif
	    {!!Form::textarea('reponse','',['class'=>'uk-textarea uk-margin-small','placeholder'=>'Entrez la reponse'])!!}

	    {!!Form::submit('Envoyer',['class'=>'uk-button uk-button-default uk-margin-small'])!!}
	{!! Form::close() !!}
	</div>
@endsection