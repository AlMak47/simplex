@extends('template')
@section('titre')
Faq
@endsection

@section('banniere')

<div class="uk-section uk-section-default">
	<div class="uk-container">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}" class="uk-icon-link" uk-icon="icon:home"></a></li>
		    <li><a>Faq</a></li>
		    <li><span>{{$details->intitule}}</span></li>
		</ul>
	</div>
</div>

@endsection

@section('content')

<div class="" uk-grid>	
		<div class="uk-width-3-4@m">
			<div class="uk-container">
				<h2 class="uk-h1">{{$details->intitule}}</h2>
				<p class="uk-text-lead uk-text-justify">
					{{$details->reponse}}
				</p>
			</div>
			<div class="uk-section uk-container">
				
				<h4>Ce sujet vous a t-il ete utile ?</h4>
				<div>
					{!!Form::open()!!}
					  <div class="uk-grid-small uk-child-width-auto uk-grid">
			            <label><input class="uk-radio" name="avis" type="radio" checked> Oui</label>
			            <label><input class="uk-radio" name="avis" type="radio"> Non</label>
			        </div>
					{!!Form::close()!!}
				</div>
				<hr class="uk-divider-small">
				<h4>Posez Votre Question</h4>
				{!!Form::open(['url'=>''])!!}
				{!!Form::text('nom_complet','',['class'=>'uk-input uk-margin-small','placeholder'=>'Nom Complet *'])!!}
				{!!Form::text('phone','',['class'=>'uk-input uk-margin-small','placeholder'=>'Telephone *'])!!}
				{!!Form::textarea('Question','',['class'=>'uk-textarea uk-margin-small','placeholder'=>'Saisissez votre question ici !!!'])!!}
				{!!Form::submit('Enovyer',['class'=>'uk-button uk-button-default'])!!}
				{!!Form::close()!!}
			</div>
		</div>
		<div class="uk-width-1-4@m">
			<div class="uk-grid-match uk-child-width-1-1">
				<div>
					<h3>Derniers Posts</h3>
					@foreach($articles as $values)
					<a class="uk-h5 uk-margin-small" href="{{url('blog',['id'=>$values->id])}}"><span uk-icon="icon:check;ratio:0.6"></span> {{$values->nom}}</a>
					@endforeach
					<hr class="uk-divider-small">
				</div>
				<div>
					<h3>Derniers Sujets?</h3>
					@foreach($questions as $values)
					<a class="uk-h5 uk-margin-small" href="{{url('faq',['id'=>$values->id])}}"><span uk-icon="icon:check;ratio:0.6"></span> {{$values->intitule}}</a>
					@endforeach
					<hr class="uk-divider-small">
				</div>
				<div>
					<h3>Suivez Nous</h3>
					<!-- // -->
		            <div class="fb-page" data-href="https://www.facebook.com/implex-BWT-Sarl-347643719117902/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/implex-BWT-Sarl-347643719117902/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/implex-BWT-Sarl-347643719117902/">Simplex BWT Sarl</a></blockquote></div>
		            <!-- /// -->
					<hr class="uk-divider-small">
				</div>
			</div>
		</div>
</div>
@endsection