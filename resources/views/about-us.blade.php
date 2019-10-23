@extends('layouts.template')
@section('titre')
{{$detail->titre}}
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-small">
		<ul class="uk-breadcrumb">
	    <li><a href=""><span uk-icon="icon:home"></span> </a></li>
	    <li><a href="">A Propos</a></li>
	    <li><span>{{$detail->titre}}</span></li>
	</ul>


		<h3>{{$detail->titre}}</h3>
		<hr class="uk-divider-small">
		<div class="">
			{!!$detail->contenu!!}
		</div>
	</div>
</div>
@endsection
