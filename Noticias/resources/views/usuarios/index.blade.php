@extends("template.admin")

@section("titulo", "Usuarios")

@section("formulario")
<form class="row" method="POST" action="/usuarios">
	<div class="col-3">
		<label>Nome</label>
		<input type="text" class="form-control" placeholder="Nome" name="nome" value="{{$usuario->name}}" />
	</div>
	<div class="col-4">
		<label>E-mail</label>
		<input type="mail" class="form-control" placeholder="E-mail" name="email" value="{{$usuario->email}}"/>
	</div>
	<div class="col-3">
		<label>Senha</label>
		<input type="password" class="form-control" placeholder="Senha" name="password" value=""/>
	</div>
	<div class="col-2" style="text-align: right;">
		<button class="btn bg-gradient-info" type="button" onclick="location.href='/usuarios';">Novo</button>
		<button type="submit" class="btn bg-gradient-success">Salvar</button>
	</div>
	@csrf
	<input type="hidden" name="id" value="{{$usuario->id}}"/>
</form>
@endsection

@section("tabela")
<table class="table align-items-center mb-0">
	<colgroup>
		<col width="300">
		<col width="300">
		<col width="50">
		<col width="50">
	</colgroup>
    <thead>
        <tr>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">E-mail</th>
			<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Editar</th>
			<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Excluir</th>
        </tr>
    </thead>
    <tbody>
		@foreach($usuarios as $usuario)
        <tr>
            <td>
                {{$usuario->name}}
            </td>
			<td>
                {{$usuario->email}}
            </td>
            <td class="align-middle text-center">
                <span class="btn bg-gradient-success">Imagens</span>
            </td>
            <td class="align-middle text-center">
                <button class="btn bg-gradient-warning" type="button" onclick="location.href='/usuarios/{{$usuario->id}}/edit';">Editar</button>
            </td>
            <td class="align-middle text-center">
			<form method="POST" action="/usuarios/{{$usuario->id}}">
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