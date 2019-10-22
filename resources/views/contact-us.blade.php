@extends('template')
@section('titre')
Contact Us
@endsection

@section('banniere')

<div class="uk-section uk-section-default">
	<div class="uk-container">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}" class="uk-icon-link" uk-icon="icon:home"></a></li>
		    <li><a>Contactez Nous</a></li>
		</ul>
	</div>
</div>

@endsection

@section('content')

<div class="uk-section uk-section-default">
	<div class="uk-container">
		@if($errors->has('email') || $errors->has('phone') || $errors->has('objet') || $errors->has('message'))
		<div class="uk-alert uk-alert-danger">
		<div>{{$errors->first('email')}}</div>
		<div>{{$errors->first('phone')}}</div>
		<div>{{$errors->first('objet')}}</div>
		<div>{{$errors->first('message')}}</div>
		</div>
		@endif
		<h3>Contact Nous</h3>
		<hr class="uk-divider-small">

		{!!Form::open(['url'=>'/contact-us'])!!}
		{!!Form::text('email','',['class'=>'uk-input uk-margin','placeholder'=>'Adresse Email'])!!}
		{!!Form::text('phone','',['class'=>'uk-input uk-margin-small','placeholder'=>'Telephone'])!!}
		{!!Form::text('objet','',['class'=>'uk-input uk-margin-small','placeholder'=>'Sujet'])!!}
		{!!Form::textarea('message','',['class'=>'uk-textarea uk-margin-small','placeholder'=>'Votre Message ici..'])!!}
		{!!Form::submit('Envoyer',['class'=>'uk-button uk-button-default'])!!}
		{!!Form::close()!!}

	</div>
</div>

@endsection