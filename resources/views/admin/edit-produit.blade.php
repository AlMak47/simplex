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
        <a class="uk-accordion-title" href="#">Editer un produit</a>
        <div class="uk-accordion-content">
          <div class="uk-alert-info uk-box-shadow-small uk-border-rounded" uk-alert>
            <p>(*) Champs Obligatoires</p>
          </div>
            {!!Form::open(['url'=>url()->current(),'id'=>'add-page-form','files'=>true])!!}
            {!!Form::hidden('reference',$edit->reference)!!}
            {!!Form::label("Nom du Produit *")!!}
            {!!Form::text('libelle',$edit->libelle,['class'=>'uk-input','placeholder'=>'Entrez le nom du produit'])!!}
            {!!Form::label('Prix Unitaire *')!!}
            {!!Form::text('prix_unitaire',$edit->prix_unitaire,['class'=>'uk-input','placeholder'=>'Entrez le prix unitaire'])!!}
            <div class=" uk-margin-small">
            {!!Form::label('Image')!!}
            {!!Form::file('image')!!}
          </div>
          <div class="uk-margin-small">
            {!!Form::label('Ficher technique')!!}
            {!!Form::file('fiche_technique')!!}
          </div>
            {!!Form::label('description')!!}
            <div class="" id="editor-container" style="height:300px">{!!$edit->description!!}</div>
            <input type="hidden" name="description" id="contenu" value="">
            <div class="uk-margin-small">
            {!!Form::submit("Validez",['class'=>'uk-button uk-button-secondary uk-border-rounded'])!!}
            </div>
            {!!Form::close()!!}
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
