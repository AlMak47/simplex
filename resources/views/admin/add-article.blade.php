@extends('home')

@section('contents')
<div class="uk-container">
		<h2 class="uk-heading-line"><span>Ajouter un article</span></h2>
	<!-- form add -->
	{!! Form::open(['url'=>'admin/add-article','enctype'=>'multipart/form-data']) !!}
		@if($errors->has('nom')):<span class="uk-alert-danger uk-margin-bottom"> {{$errors->first('nom')}} </span>@endif
	    {!!Form::text('nom','',['class'=>'uk-input uk-margin-small uk-margin-top','placeholder'=>'Titre'])!!}
	    @if($errors->has('description')):<span class="uk-alert-danger uk-margin-bottom"> {{$errors->first('description')}} </span>@endif
	    {!!Form::textarea('description','',['class'=>'uk-textarea uk-margin-small','placeholder'=>'Entrez la description'])!!}
	    image {!!Form::file('image')!!}
	    {!!Form::submit('Envoyer',['class'=>'uk-button uk-button-default uk-margin-small'])!!}
	{!! Form::close() !!}
	</div>
@endsection