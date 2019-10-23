@extends('layouts.template')

@section('titre')
Admin-Pages
@endsection

@section("content")
<div class="uk-section uk-section-default">
  <div class="uk-container uk-container-small">
    <h3>Pages</h3>
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
    </div>Redigez ici...
    @endforeach
    @endif
    <ul uk-accordion>
    <!-- <li class="uk-open">
        <a class="uk-accordion-title" href="#">Ajouter une page</a>
        <div class="uk-accordion-content">
            {!!Form::open(['url'=>'admin/pages/add','id'=>'add-page-form'])!!}
            {!!Form::label("Titre")!!}
            {!!Form::text('titre','',['class'=>'uk-input','placeholder'=>'Entrez le titre de la page'])!!}
            {!!Form::label('Contenu')!!}
            <div class="" id="editor-container" style="height:300px">Redigez ici...</div>
            <input type="hidden" name="contenu" id="contenu" value="">
            <div class="uk-margin-small">
            {!!Form::submit("Validez",['class'=>'uk-button uk-button-secondary uk-border-rounded'])!!}
            </div>
            {!!Form::close()!!}
        </div>
    </li> -->
    <li class="uk-open">
      <a class="uk-accordion-title" href="#">Toutes les pages</a>
      <div class="uk-accordion-content">
        @if($pages)
        <ul class="uk-list uk-list-divider">
        @foreach($pages as $page)
        <li><a href="{{url('admin/pages',[$page->slug,'edit'])}}"> <span uk-icon="icon:link"></span> {{$page->titre}}</a></li>
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
