@extends("template.public")

<style>
	.carousel-inner img{
		width:80%;
		height:80%;
	}
</style>
@section("noticias")
	
	@foreach($noticias as $noticia)
	
		<div class="card">
            <div class="content">
                <h4 class="title">{{$noticia->titulo}}</h4>
				
				<h6 class="description">{{$noticia->subtitulo}}</h6>
				
				<h6 class="category">Criado em:{{ $noticia->created_at}}</h6>
				
                <p class="description">
					{{$noticia->texto}}
					<div id="carousel{{$noticia->id}}" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->	
							<ul class="carousel-indicators">
								@php
									$i = 0;
								@endphp
								@foreach($noticia->imagens as $imagem)
									@if($i == 0)
										<li data-target="#carousel{{$noticia->id}}" data-slide-to="{{$i}}" class="active"></li>
									@else
										<li data-target="#carousel{{$noticia->id}}" data-slide-to="{{$i}}"></li>
									@endif
									@php
										$i++;
									@endphp
								@endforeach
							</ul>
						<!-- The slideshow -->
							<div class="carousel-inner">
								@php
									$i = 0;
								@endphp
								@foreach($noticia->imagens as $imagem)
									@if($i == 0)
										<div class="carousel-item active">
											<img src="{{asset($imagem->url);}}" height="500"/>
										</div>
									@else
										<div class="carousel-item">
											<img src="{{asset($imagem->url);}}" height="500"/>
										</div>
									@endif
									@php
										$i++;
									@endphp
								@endforeach
							</div>
						<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#carousel{{$noticia->id}}" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#carousel{{$noticia->id}}" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
					</div>
				</p>
            </div>
        </div> <!-- end card -->
	
	@endforeach
	
	<div class="card">
		<div class="content" style="text-align:center;">
			@if(!($noticias->onFirstPage()))
				<a href="{{$noticias->previousPageUrl()}}" class="btn"><<Anterior</a>
			@endif
			
			@for($i = 1; $i <= $noticias->lastPage(); $i++)
				@if($i == $noticias->currentPage())
					<a href="{{$noticias->url($i)}}" class="btn" style="background-color: #888888!important;">{{$i}}</a>
				@else
				<a href="{{$noticias->url($i)}}" class="btn">{{$i}}</a>
				@endif
			@endfor
			
			@if($noticias->hasMorePages())
				<a href="{{$noticias->nextPageUrl()}}" class="btn">Próximo>></a>
			@endif
		</div>
	</div>
	
	<script>
		window.addEventListener("load", function() {
			$('.carousel').carousel();
		});
	</script>
@endsection
