@extends ('layouts.admin')
@section ('contenido')
<!--<div class="row">-->

<ul class="breadcrumb">
    <li><a href="#">Inicio</a></li>
    <li><a href="{{url('inventario/usuario')}}">Usuarios</a></li>
    <li class="active">Actualizar Usuario</li>
</ul>

<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">

            <h4><i class='fa fa-user'></i> Editar Usuario: {{ $usuario->name}}</h4>

        </div>
        <div class="panel-body">

            <p id="resultados_ajax" class="col-lg-6 col-md-6 col-sm-6 col-xs-12"></p>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                        <label for="name">Nombres y Apellidos</label>
                        <input type="text" name="name" class="form-control" required value="{{ $usuario->name}}" minlength="5" maxlength="50" onkeypress="return esLetra();" placeholder="Escriba sus Nombres y Apellidos">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
                    <div class="form-group">
                        <label for="tipo">Tipo de Usuario</label>
                        <select class="form-control " id="tipo"   name="tipo">
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
                        <label for="fechaNac">Fecha de Nacimiento</label>
                        <input type="date" name="fechaNac" class="form-control" required value="{{$usuario->fechaNac}}" placeholder="Fecha de Nacimiento">
                    </div> 
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
                    <div class="form-group">
                        <label for="ciudadNac">Ciudad de Nacimiento</label>
                        <input type="text" name="ciudadNac" class="form-control" required value="{{$usuario->ciudadNac}}" maxlength="30" minlength="2" onkeypress="return esLetra();" placeholder="Escriba la ciudad de Nacimiento">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-sm-6 col-md-5 col-sx-12">
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" class="form-control" required value="{{$usuario->direccion}}" maxlength="100" minlength="2"  placeholder="Escriba su Dirección">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" name="telefono" class="form-control" required value="{{$usuario->telefono}}" onkeypress="return esDigito()" maxlength="7" minlength="10" placeholder="Escriba su número de teléfono">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-sm-6 col-md-5 col-sx-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" required value="{{ $usuario->email}}" maxlength="50" class="form-control" placeholder="Email...">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
                    <div class="form-group">
                        <label for="estado">Seleccione el estado</label>
                        <select class="form-control "  id="estado" required="" name="estado">
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
        </div>
    </div>
</div>
@endsection