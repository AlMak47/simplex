@extends('home')

@section('contents')
<div class="uk-container">
		<h2 class="uk-heading-line"><span>List des produits</span></h2>
		
		@if($produits)
		<ul class="uk-list uk-list-striped">
			@foreach($produits as $values)
				<li>
					<span>{{$values->nom}}</span>
					<span class="uk-align-right">	
						<a href="" class="uk-button uk-button-link">edit</a>
						{!!Form::open(['url'=>'admin/produit/delete/'.$values->id])!!}
						<input type="hidden" name="_method" value="DELETE">
						{!!Form::submit('Delete')!!}
						{!!Form::close()!!}
					</span>
				</li>
			@endforeach
			
		</ul>
		@endif
	</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$(function() {
		// jquery goes here
	});
</script>

@endsection