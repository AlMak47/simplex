@extends('layouts.template')

@section('titre')
Admin-Produit
@endsection

@section("content")
<div class="uk-section uk-section-default">
  <div class="uk-container uk-container-small">
    <h3>Produits</h3>
    <hr class="uk-divider-small">
    @if(session('success'))
    <div class="uk-alert-success uk-box-shadow-small uk-border-rounded" uk-alert>
      <a href="#" class="uk-alert-close" uk-close></a>
      <p>{{session("success")}}</p>
    </div>
    @endif
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="uk-alert-danger uk-box-shadow-small uk-border-rounded" uk-alert>
      <a href="#" class="uk-alert-close" uk-close></a>
      <p>{{$error}}</p>
    </div>
    @endforeach
    @endif
    <ul uk-accordion>
    <li class="uk-open">
        <a class="uk-accordion-title" href="#">Ajouter un produit</a>
        <div class="uk-accordion-content">
          <div class="uk-alert-info uk-box-shadow-small uk-border-rounded" uk-alert>
            <p>(*) Champs Obligatoires</p>
          </div>
            {!!Form::open(['url'=>'admin/produits/add','id'=>'add-page-form','files'=>true])!!}
            {!!Form::label("Nom du Produit *")!!}
            {!!Form::text('libelle','',['class'=>'uk-input','placeholder'=>'Entrez le nom du produit'])!!}
            {!!Form::label('Prix Unitaire *')!!}
            {!!Form::text('prix_unitaire','',['class'=>'uk-input','placeholder'=>'Entrez le prix unitaire'])!!}
            <div class=" uk-margin-small">
            {!!Form::label('Image')!!}
            {!!Form::file('image')!!}
          </div>
          <div class="uk-margin-small">
            {!!Form::label('Ficher technique')!!}
            {!!Form::file('fiche_technique')!!}
          </div>
            {!!Form::label('description')!!}
            <div class="" id="editor-container" style="height:300px">Redigez ici...</div>
            <input type="hidden" name="description" id="contenu" value="">
            <div class="uk-margin-small">
            {!!Form::submit("Validez",['class'=>'uk-button uk-button-secondary uk-border-rounded'])!!}
            </div>
            {!!Form::close()!!}
        </div>
    </li>
    <li class="uk-open">
      <a class="uk-accordion-title" href="#">Tous les produits</a>
      <div class="uk-accordion-content">
        @if($produits)
        <ul class="uk-list">
        @foreach($produits as $produit)
        <li class=""> <a uk-tooltip="Supprimer"><span class="uk-button-danger uk-padding-small uk-border-circle" uk-icon="icon : trash ; ratio : 0.7"></span></a> <a href="{{url('/admin/produits',[$produit->reference,'edit'])}}">{{$produit->libelle}}</a></li>
        @endforeach
        </ul>
        @endif
      </div>
    </li>
  </ul>
  </div>
</div>
@endsection
@section("scripts")
<script type="text/javascript">
  $(function () {
    var quill = new Quill("#editor-container",{

      placeholder: 'Redigez ici ...',
      theme: 'snow'
    })

    $("#add-page-form").on('submit',function() {
      $("#contenu").val(quill.root.innerHTML)
    })
  })
</script>
@endsection
