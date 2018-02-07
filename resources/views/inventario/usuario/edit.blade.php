@extends ('layouts.admin')
@section ('contenido')
<!--<div class="row">-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h3>Editar Usuario: {{ $usuario->name}}</h3>
    @if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

{!!Form::model($usuario,['method'=>'PATCH','route'=>['usuario.update',$usuario->id]])!!}
{{Form::token()}}

<div class="row">
    <div class="col-lg-5 col-sm-6 col-md-5 col-sx-12">
        <div class="form-group">
            <label for="edit_name">Nombres y Apellidos</label>
            <input type="text" name="edit_name" class="form-control" required value="{{ $usuario->name}}" minlength="5" maxlength="50" onkeypress="return esLetra();" placeholder="Escriba sus Nombres y Apellidos">
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
        <div class="form-group">
            <label for="edit_tipo">Tipo de Usuario</label>
            <select class="form-control " id="tipo"  name="edit_tipo">
                <option value="">Seleccione una opcion</option>
                <option value="1">Administrador</option>
                <option value="2">Bodeguero</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-5 col-sm-6 col-md-5 col-sx-12">
        <div class="form-group">
            <label for="edit_fechaNac">Fecha de Nacimiento</label>
            <input type="date" name="edit_fechaNac" class="form-control" required value="{{$usuario->fechaNac}}" placeholder="Fecha de Nacimiento">
        </div> 
    </div>
    <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
        <div class="form-group">
            <label for="edit_ciudadNa">Ciudad de Nacimiento</label>
            <input type="text" name="edit_ciudadNa" class="form-control" required value="{{$usuario->ciudadNac}}" maxlength="30" minlength="2" onkeypress="return esLetra();" placeholder="Escriba la ciudad de Nacimiento">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-5 col-sm-6 col-md-5 col-sx-12">
        <div class="form-group">
            <label for="edit_direccion">Dirección</label>
            <input type="text" name="edit_direccion" class="form-control" required value="{{$usuario->direccion}}" maxlength="100" minlength="2"  placeholder="Escriba su Dirección">
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
        <div class="form-group">
            <label for="edit_telefono">Teléfono</label>
            <input type="tel" name="edit_telefono" class="form-control" required value="{{$usuario->telefono}}" onkeypress="return esDigito()" maxlength="10" minlength="7" placeholder="Escriba su número de teléfono">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-5 col-sm-6 col-md-5 col-sx-12">
        <div class="form-group">
            <label for="edit_email">Email</label>
            <input type="email" name="edit_email" required value="{{ $usuario->email}}" maxlength="50" class="form-control" placeholder="Email...">
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
        <div class="form-group">
            <label for="edit_estado">Seleccione el estado</label>
            <select class="form-control "  id="estado" required="" name="edit_estado">
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
            </select>
        </div>
    </div>
 


</div>
<div class="row">
    <div class="col-lg-5 col-sm-5 col-md-5 col-sx-12">

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('inventario/usuario')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
    {!!Form::close()!!}		

</div>

@endsection