@extends('layouts.template')

@section('titre')
Home
@endsection
@section('content')
<!-- banniere -->
<div class="uk-position-relative uk-visible-toggle uk-light uk-margin-remove uk-padding-remove" uk-slideshow="animation: push ;  max-height: 300" >

  @if($slides)
    <ul class="uk-slideshow-items">
      @foreach($slides as $slide)
        <li>
            <img src="{{asset('slideshow/'.$slide->slide)}}" alt="" uk-cover>
            <div class="uk-overlay uk-overlay-primary uk-position-bottom-left uk-text-center uk-transition-slide-bottom">
                <h3 class="uk-margin-remove">{{$slide->titre}}</h3>
                <p class="uk-margin-remove">{!!$slide->description!!}</p>
            </div>
        </li>
        @endforeach
    </ul>
    @endif

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div>
<!-- // -->
<!-- about us -->
<div class="uk-section uk-section-default">
  <div class="uk-container uk-container-small" uk-scrollspy="cls:uk-animation-slide-bottom; delay : 500">
    <h3 class="">A Propos</h3>
    <hr class="uk-divider-small">
    <p>
      {!!$pages[0]->contenu!!}
    </p>
    <a href="{{url('a-propos',[$pages[2]->slug])}}" class="uk-button uk-button-text uk-text-capitalize">En savoir plus <span uk-icon="icon : arrow-right;"></span> </a>
  </div>
</div>
<!-- // -->
<!-- NOs Produits -->
<div class="uk-section uk-section-muted">
  <div class="uk-container uk-container-small">
    <h3>Nos Produits</h3>
    <hr class="uk-divider-small">
    <div class="uk-child-width-1-3@m" uk-grid uk-scrollspy="cls: uk-animation-slide-right; target: .uk-card; delay: 200; repeat: true">
      @if($produits)
      @foreach($produits as $produit)
      <div class="">
      <div class="uk-card uk-card-default uk-padding-remove uk-border-rounded uk-box-shadow-small item">
            <div class="uk-card-media-top">
              @if($produit->image == 'default.png')
              <img src="{{asset('uploads/default.svg')}}" style="opacity : 0.2;" alt="">
                @else
                <img src="{{asset('uploads/'.$produit->image)}}" class="item-img" alt="">
                @endif
            </div>
            <div class="uk-card-body">
                <h4 class="">{{$produit->libelle}}</h4>
                <p>{!!str_limit($produit->description,50,'...')!!}</p>
                <a href="#" class="uk-button uk-button-text uk-text-capitalize">Details <span uk-icon="icon:arrow-right"></span> </a>
            </div>
          </div>
        </div>
      @endforeach
      @endif

  </div>
</div>
<!-- // -->
@endsection
