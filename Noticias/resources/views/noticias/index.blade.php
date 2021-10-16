@extends("template.admin")

@section("titulo", "Notícias")

@section("formulario")
<form class="row" method="POST" action="/noticias">
	<div class="col-4">
		<label>Titulo</label>
		<input type="text" class="form-control" placeholder="Titulo" name="titulo" value="{{$noticia->titulo}}" />
	</div>
	<div class="col-8">
		<label>Sub-título</label>
		<input type="text" class="form-control" placeholder="Sub-titulo" name="subtitulo" value="{{$noticia->subtitulo}}"/>
	</div>
	<div class="col-10">
		<label>Texto</label>
		<textarea name="texto" rows="6" placeholder="Digite aqui sua noticia..." class="form-control">{{$noticia->texto}}</textarea>
	</div>
	<div class="col-2" style="text-align:right;">
		<br/>
		<br/>
		<button class="btn bg-gradient-info" type="button" onclick="location.href='/noticias';">Novo</button>
		<br/>
		<br/>
		<button type="submit" class="btn bg-gradient-success">Salvar</button>
	</div>
	@csrf
	<input type="hidden" name="id" value="{{$noticia->id}}"/>
</form>
@endsection

@section("tabela")
<table class="table align-items-center mb-0">
	<colgroup>
		<col width="600">
		<col width="50">
		<col width="50">
		<col width="50">
	</colgroup>
    <thead>
        <tr>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Notícia</th>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Imagens</th>
			<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Editar</th>
			<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Excluir</th>
        </tr>
    </thead>
    <tbody>
		@foreach($noticias as $noticia)
        <tr>
            <td>
                <div class="d-flex py-1">    
					<div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$noticia->titulo}}</h6>
                        <p class="text-xs text-secondary mb-0">{{$noticia->subtitulo}}</p>
                    </div>
                </div>
            </td>
            <td class="align-middle text-center">
                <span class="btn bg-gradient-success">Imagens</span>
            </td>
            <td class="align-middle text-center">
                <button class="btn bg-gradient-warning" type="button" onclick="location.href='/noticias/{{$noticia->id}}/edit';">Editar</button>
            </td>
            <td class="align-middle text-center">
			<form method="POST" action="/noticias/{{$noticia->id}}">
				<input type="hidden" name="_method" value="DELETE"/>
				@csrf
                <button type="submit" class="btn bg-gradient-danger">Excluir</button>
			</form>
            </td>        
        </tr>
		@endforeach
	</tbody>
</table>
@endsection