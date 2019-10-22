@extends('home')

@section('contents')
<div class="uk-container">
		<h2 class="uk-heading-line"><span>Ajouter un produit</span></h2>
	<!-- form add -->
	{!! Form::open(['url'=>'admin/addproduit','enctype'=>'multipart/form-data']) !!}
		@if($errors->has('nom')):<span class="uk-alert-danger uk-margin-bottom"> {{$errors->first('titre')}} </span>@endif
	    {!!Form::text('nom','',['class'=>'uk-input uk-margin-small uk-margin-top','placeholder'=>'Entrez le nom'])!!}
	    @if($errors->has('description')):<span class="uk-alert-danger uk-margin-bottom"> {{$errors->first('titre')}} </span>@endif
	    {!!Form::textarea('description','',['class'=>'uk-textarea uk-margin-small','placeholder'=>'Entrez la description'])!!}
	    image {!!Form::file('image')!!}
	    fichier {!!Form::file('fichier')!!}

	    {!!Form::submit('Envoyer',['class'=>'uk-button uk-button-default uk-margin-small'])!!}
	{!! Form::close() !!}
	</div>
@endsection