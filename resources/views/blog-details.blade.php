@extends('template')

@section('titre')
Blog
@endsection

@section('banniere')

<div class="uk-section uk-section-default">
	<div class="uk-container">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}" class="uk-icon-link" uk-icon="icon:home"></a></li>
		    <li><a>Blog</a></li>
		    <li><span>{{$details->nom}}</span></li>
		</ul>
	</div>
</div>

@endsection

@section('content')

<div class="" uk-grid>	
		<div class="uk-width-3-4@m">
			<div class="uk-container">
				<h2 class="uk-h1">{{$details->nom}}</h2>
				<img src="{{asset('uploads/'.$details->image)}}" class="uk-height-medium" uk-img>
				<p class="uk-text-lead uk-text-justify">
					{{$details->description}}
				</p>
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
					<h3>Que Voulez Savoir ?</h3>
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