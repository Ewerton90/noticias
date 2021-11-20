@extends("template.modal")

@section("titulo", "Imagens")

@section("formulario")
<form class="row" method="POST" action="/imagens" enctype="multipart/form-data">
	<div class="col-10">
		<input type="file" name="url" class="form-control"/>
	</div>
	<div class="col-2" style="text-align:right;">
		<button type="submit" class="btn bg-gradient-success">Salvar</button>
	</div>
	@csrf
	<input type="hidden" name="noticia" value="{{$noticia}}"/>
</form>
@endsection

@section("tabela")
<table class="table align-items-center mb-0">
	<colgroup>
		<col width="600">
		<col width="50">
	</colgroup>
    <thead>
        <tr>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Imagem</th>
			<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Excluir</th>
        </tr>
    </thead>
    <tbody>
		@foreach($imagens as $imagem)
        <tr>
            <td>
				<img src=" {{asset($imagem->url);}}" width="600"/>
            </td>
            <td class="align-middle text-center">
				<form method="POST" action="/imagens/{{$imagem->id}}">
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