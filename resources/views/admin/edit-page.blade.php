@extends('layouts.template')
@section('titre')

@endsection

@section('content')
<div class="uk-section uk-section-default">
  <div class="uk-container uk-container-small">
    <h3>Edit pages</h3>
    <hr class="uk-divider-small">
    @if(session('success'))
    <div class="uk-alert-success uk-box-shadow-small uk-border-rounded" uk-alert>
      <a href="#" class="uk-alert-close" uk-close></a>
      <p>{{session('success')}}</p>
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
    {!!Form::open(['url'=>url()->current(),'id'=>'add-page-form'])!!}
    {!!Form::label("Titre")!!}
    {!!Form::text('titre',$edit->titre,['class'=>'uk-input','placeholder'=>'Entrez le titre de la page'])!!}
    {!!Form::label('Contenu')!!}
    <div class="" id="editor-container" style="height:300px">{!!$edit->contenu!!}</div>
    <input type="hidden" name="contenu" id="contenu" value="">
    <input type="hidden" name="slug" value="{{$edit->slug}}">
    <div class="uk-margin-small">
    {!!Form::submit("Validez",['class'=>'uk-button uk-button-secondary uk-border-rounded'])!!}
    </div>
    {!!Form::close()!!}
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
