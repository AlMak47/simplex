@extends('template')
@section('titre')
About Us
@endsection

@section('banniere')

<div class="uk-section uk-section-default">
	<div class="uk-container">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}" class="uk-icon-link" uk-icon="icon:home"></a></li>
		    <li><a>A propos</a></li>
		    <li><span>{{$item}}</span></li>
		</ul>
	</div>
</div>

@endsection

@section('content')
<div class="" uk-grid>	

		<div class="uk-section uk-section-default uk-margin-remove-top uk-width-3-4@m">
			<div class="uk-container">
				<h3 class="uk-text-capitalize uk-h2">{{$data->titre}} </h3>
				<hr class="uk-divider-small">
				<p class=" uk-text-justify uk-text-lead">
					{{$data->contenu}}
				</p>
			</div>
			<div class="uk-container uk-margin-large-top">
				<!-- google maps -->
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12805.5029542514!2d-13.654138935534661!3d9.608137871825546!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6764689d8d455449!2sSIMPLEX+BWT!5e1!3m2!1sfr!2s!4v1550339242055" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				<!-- // -->
			</div>
		</div>

		<div class="uk-width-1-4@m">
			<div class="uk-grid-match uk-child-width-1-1">
				<div>
					<h3>Derniers Posts</h3>
					@foreach($post as $values)
					<a class="uk-h5 uk-margin-small" href="{{url('blog',['id'=>$values->id])}}">{{$values->nom}}</a>
					@endforeach
					<hr class="uk-divider-small">
				</div>
				<div>
					<h3>Que Voulez Savoir ?</h3>
					@foreach($faq as $values)
					<a class="uk-h5 uk-margin-small" href="{{url('faq',['id'=>$values->id])}}">{{$values->intitule}}</a>
					@endforeach
					<hr class="uk-divider-small">
				</div>
				<div>
					<h3>Suivez Nous</h3>
					<!-- // -->
		            <div class="fb-page uk-margin-right" data-href="https://www.facebook.com/implex-BWT-Sarl-347643719117902/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/implex-BWT-Sarl-347643719117902/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/implex-BWT-Sarl-347643719117902/">Simplex BWT Sarl</a></blockquote></div>
		            <!-- /// -->
					<hr class="uk-divider-small">
				</div>
			</div>
		</div>
</div>
@endsection