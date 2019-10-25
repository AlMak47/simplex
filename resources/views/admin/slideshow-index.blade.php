@extends('layouts.template')

@section('titre')
Admin-Slideshow
@endsection

@section("content")
<div class="uk-section uk-section-default">
  <div class="uk-container uk-container-small">
    <h3>Slideshow</h3>
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
        <a class="uk-accordion-title" href="#">Ajouter une Slide</a>
        <div class="uk-accordion-content">
            {!!Form::open(['url'=>'admin/slideshow/add','id'=>'add-page-form','files' =>  true])!!}
            {!!Form::label("Titre")!!}
            {!!Form::text('titre','',['class'=>'uk-input','placeholder'=>'Entrez le titre'])!!}
            <div class="uk-margin-small">
              {!!Form::label('Image')!!}
              {!!Form::file('slide')!!}
            </div>
            {!!Form::label('Description')!!}
            <div class="" id="editor-container" style="height:300px">Redigez ici...</div>
            <input type="hidden" name="contenu" id="contenu" value="">
            <div class="uk-margin-small">
            {!!Form::submit("Validez",['class'=>'uk-button uk-button-secondary uk-border-rounded'])!!}
            </div>
            {!!Form::close()!!}
        </div>
    </li>
    <li class="uk-open">
      <a class="uk-accordion-title" href="#">Toutes les Slides</a>
      <div class="uk-accordion-content">
        @if($slides)
        <ul class="uk-list">
          @foreach($slides as $slide)
          <li><a uk-tooltip="Supprimer"><span class="uk-button-danger uk-padding-small uk-border-circle" uk-icon="icon : trash ; ratio : 0.7"></span></a><a href="{{url('admin/slideshow',[$slide->id,'edit'])}}">  {{$slide->titre}}</a></li>
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
