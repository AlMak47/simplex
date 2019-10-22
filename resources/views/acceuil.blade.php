@extends('template')

@section('titre')
Home
@endsection

@section('banniere')
    <div uk-slideshow="max-height: 300">
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
    <ul class="uk-slideshow-items">
        <li>
            <img src="{{asset('img/sug.png')}}" alt="" uk-cover>
        </li>
        <li>
            <img src="{{asset('img/sug2.png')}}" alt="" uk-cover>
        </li>
    </ul>
    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
</div>
    <ul>
        <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
    </ul>
</div>
@endsection

@section('content')
<!-- WHAT WHERE WHY SECTION -->
    <div class="uk-section uk-section-default uk-padding-remove">
    <div class="uk-container">

        <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
            @foreach($questions as $values)
            <div>
                <h3>{{$values->intitule}}</h3>
                <hr class="uk-divider-small">
                <p>{{str_limit($values->reponse,100)}}</p>
                <a href="{{url('faq',['id'=>$values->id])}}" class="uk-text-capitalize uk-text-left uk-width-1-2 uk-icon-link uk-button uk-button-default uk-border-rounded" uk-icon="icon:arrow-right">En savoir plus</a>
            </div>
            @endforeach
            
        </div>

    </div>
</div>
<!-- // -->
<hr class="uk-divider-small uk-text-center uk-margin-bottom-remove">
<!-- NEWS SECTION  -->
<div class="uk-section uk-section-default uk-padding-remove">
    <div class="uk-container">
        <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
        @foreach($produits as $values)
        <div class="uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
            <div class="uk-card-media-left uk-cover-container">
                <img src="{{asset('uploads/'.$values->image)}}" class="uk-width-1-4 uk-height-1-3 uk-align-center"  alt="" uk-img>
            </div>
            <div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">{{$values->nom}}</h3>
                    <p>{{$values->description}}</p>
                    <!-- <a href="{{url('produits',['id'=>$values->id])}}" class="uk-text-capitalize uk-text-left uk-width-1-1 uk-icon-link uk-button uk-button-default uk-border-rounded" uk-icon="icon:arrow-right">En savoir plus</a> -->
                </div>
            </div>
        </div>
        @endforeach
        <div>
            <!-- // -->
            <div class="fb-page" data-href="https://www.facebook.com/implex-BWT-Sarl-347643719117902/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/implex-BWT-Sarl-347643719117902/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/implex-BWT-Sarl-347643719117902/">Simplex BWT Sarl</a></blockquote></div>
            <!-- /// -->
        </div>
    </div>
    </div>
</div>
<!-- // -->

<hr class="uk-divider-small uk-text-center uk-margin-bottom-remove">
<!-- blog -->
<div class="uk-section uk-section-default">
    <div class="uk-container">
        <h3>BLOG</h3>
        <div uk-slider="autoplay:true;autoplay-interval:5000">

            <div class="uk-position-relative uk-visible-toggle uk-light">

                <ul class="uk-slider-items uk-child-width-1-3@s uk-grid">
                    @foreach($articles as $values)
                    <li>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <img src="{{asset('uploads/'.$values->image)}}" class="uk-height-medium" alt="" uk-img>
                            </div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title">{{$values->nom}}</h3>
                                <p>{{str_limit($values->description,100)}}</p>
                                <a href="{{url('blog',['id'=>$values->id])}}" uk-icon="icon:arrow-right" class="uk-icon-link uk-text-capitalize uk-button uk-button-default uk-border-rounded" style="color:black !important;">En savoir plus</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

            </div>

            <!-- <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul> -->

        </div>
    </div>
</div>
<!-- // -->
@endsection