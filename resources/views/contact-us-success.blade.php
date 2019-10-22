@extends('template')

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
		<div class="uk-alert uk-alert-success">
			<p>
				{{$success}}
			</p>
			<p>
				<a href="{{url('/')}}" class="uk-icon-link uk-button uk-button-default" uk-icon="icon:arrow-right">Continuer sur le site</a>
			</p>
		</div>
	</div>
</div>

@endsection