@extends('layouts.app')

@section('content')
<!-- navbar -->
<nav>
    <span><a href="{{url('admin/addproduit')}}" class="uk-button">ADD PRODUITS</a></span>
    <span><a href="{{url('admin/listproduit')}}" class="uk-button">LIST PRODUITS</a></span>
    <span><a href="{{url('admin/add-question')}}" class="uk-button">ADD QUESTION</a></span>
    <span><a href="{{url('admin/list-question')}}" class="uk-button">LIST QUESTION</a></span>
    <span><a href="{{url('admin/add-article')}}" class="uk-button">ADD ARTICLE</a></span>
    <span><a href="{{url('admin/list-article')}}" class="uk-button">LIST ARTICLE</a></span>
    <span><a href="{{url('admin/about-settings')}}" class="uk-button">ABOUT SETTINGS</a></span>
</nav>
<!-- // -->
@yield('contents')


<script  src="https://code.jquery.com/jquery-3.1.1.min.js"  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="  crossorigin="anonymous"></script>
<!-- UIkit JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/js/uikit-icons.min.js"></script>
@yield('scripts')
@endsection
