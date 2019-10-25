<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simplex-@yield('titre')</title>
    <link rel="shortcut icon" href="{{asset('img/logo-transp.png')}}" type="image/png" />
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/css/uikit.min.css" />
	<link rel="stylesheet" href="{{asset('css/styles.css')}}">
	<!-- Theme included stylesheets -->
	<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>

<div class="uk-container uk-container-medium">
<!-- HEADER -->
<nav class="uk-navbar-container menu uk-box-shadow-small uk-border-rounded" uk-sticky uk-navbar>
	<div class="uk-navbar-left">
			<a href="{{url('/')}}" class="uk-navbar-item uk-logo"><img src="{{asset('img/logo-transp.png')}}" class="logo uk-position-z-index uk-margin-medium-left uk-position-absolute" alt="">	</a>
	</div>
	<div class="uk-navbar-center">
		<ul class="uk-navbar-nav">
			@if(Auth::check())
			<li class=""><a class="uk-text-capitalize" href="#">Admin <span uk-icon="icon : triangle-down"></span> </a>
				<div class="uk-navbar-dropdown">
            <ul class="uk-nav uk-navbar-dropdown-nav">
                <li><a href="{{url('/admin/pages')}}">Pages</a></li>
                <li><a href="{{url('/admin/slideshow')}}">Bannieres</a></li>
                <li><a href="{{url('admin/produits')}}">Produits</a></li>
                <li><a href="#">Emails</a></li>
								<li><a href="#">Parametres</a></li>
                <li><a id="logout-button">logout</a></li>
            </ul>
        </div>
				{!!Form::open(['url'=>'/logout','id'=>'form-logout'])!!}
				{!!Form::close()!!}
			</li>
			@endif
			<li class=""><a class="uk-text-capitalize" href="#">A Propos <span uk-icon="icon : triangle-down"></span> </a>
				<div class="uk-navbar-dropdown">
					@if($pages)
					<ul class="uk-nav uk-navbar-dropdown-nav">
					@foreach($pages as $page)
            <li class="uk-active"><a href="{{url('a-propos',[$page->slug])}}">{{$page->titre}}</a></li>
						@endforeach
					</ul>
						@endif
        </div>
			</li>
			<li><a class="uk-text-capitalize" href="#">Nos Produits</a></li>
			<li><a class="uk-text-capitalize" href="#">Faq</a></li>
			<li><a class="uk-text-capitalize" href="#">Blog</a></li>
			<li><a class="uk-text-capitalize" href="#">Contactez Nous</a></li>
		</ul>
	</div>
	<div class="uk-navbar-right">
		<ul class="uk-navbar-nav">
			<li><a class="" href="#"> <span class="uk-button-primary facebook-button uk-padding-small uk-border-circle uk-box-shadow-small" uk-icon="icon:facebook;ratio : 0.7"></span> </a> </li>
		</ul>
	</div>
</nav>
<!-- // -->
	@yield('content')

</div>

<footer class="uk-background-default uk-text-center">
	<p>copyright&copy; {{date('Y')}} | Designed by Smartech</p>
</footer>
<!-- // -->
<!-- /////////+++++++++++================== -->
<script  src="https://code.jquery.com/jquery-3.1.1.min.js"  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="  crossorigin="anonymous"></script>
<!-- UIkit JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/js/uikit-icons.min.js"></script>
<!-- Main Quill library -->
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script type="text/javascript">
	$(function () {
		$("#logout-button").on("click",function () {
			$("#form-logout").submit()
		})
	})
</script>
@yield('scripts')
</body>
</html>
