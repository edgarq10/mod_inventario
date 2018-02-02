@extends ('layouts.admin')
@section ('contenido')
<div class="container-fluid">
<ul class="breadcrumb">
    <li><a href="#">Inicio</a></li>
    <li><a href="{{url('inventario/usuario')}}">Usuarios</a></li>
    <li class="active">Nuevo usuario</li>
</ul>

    <div class="row">
        <p id="resultados_ajax" class="col-lg-6 col-md-6 col-sm-6 col-xs-12"></p>
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
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4><i class='fa fa-user-plus'></i> Nuevo Usuario</h4>
        </div>
        <div class="panel-body">
            {!!Form::open(array('url'=>'inventario/usuario','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-4 col-sm-5 col-md-4 col-sx-12">
                        <div class="form-group">
                            <label for="tipo_id">Tipo de indentificación</label>
                            <select class="form-control " id="tipo_id"  name="tipo_id">
                                <option value="1">Cédula</option>
                                <option value="2">R.U.C</option>
                                <option value="3">Pasaporte</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-4 col-md-3 col-sx-12">
                        <div class="form-group">
                            <label for="cedula">CI/RUC/Pasaporte</label>
                            <input type="text" name="cedula" class="form-control" id="cedula" required value="{{old('cedula')}}"  onkeypress="return esDigito()" maxlength="13" minlength="10" placeholder="Cédula">

                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-3 col-md-2 col-sx-12">
                        <div class="form-group">
                            <label>Validar ID</label>
                            <button type="button" class="btn btn-default form-control" onclick="checkCedula()">Validar</button>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-6 col-md-5 col-sx-12">
                        <div class="form-group">
                            <label for="name">Nombres y Apellidos</label>
                            <input type="text" name="name" class="form-control" required value="{{old('nombre')}}" minlength="5" maxlength="50" onkeypress="return esLetra();" placeholder="Escriba sus Nombres y Apellidos">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
                        <div class="form-group">
                            <label for="tipo">Tipo de Usuario</label>
                            <select class="form-control " id="tipo"  name="tipo">
                                <option value="">Seleccione una opción</option>
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
                            <input type="date" name="fechaNac" class="form-control" required value="{{old('fechaNac')}}" placeholder="Fecha de Nacimiento">
                        </div> 
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
                        <div class="form-group">
                            <label for="ciudadNac">Ciudad de Nacimiento</label>
                            <input type="text" name="ciudadNac" class="form-control" required value="{{old('ciudadNac')}}" maxlength="30" minlength="2" onkeypress="return esLetra();" placeholder="Escriba la ciudad de Nacimiento">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-6 col-md-5 col-sx-12">
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" class="form-control" required value="{{old('direccion')}}" maxlength="100" minlength="2"  placeholder="Escriba su Dirección">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" name="telefono" class="form-control" required value="{{old('telefono')}}" onkeypress="return esDigito()" maxlength="10" minlength="7" placeholder="Escriba su número de teléfono">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-6 col-md-5 col-sx-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" required value="{{old('email')}}" maxlength="50" class="form-control" placeholder="Email...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5 col-sm-6 col-md-5 col-sx-12">
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
                    <div class="col-lg-5 col-sm-6 col-md-5 col-sx-12">
                        <div class="form-group">
                            <label for="estado"></label>
                            <button class="btn btn-primary" disabled="" id="guardar_datos" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                            <button class="btn btn-info" type="reset">Limpiar</button>
                        </div>
                    </div>
                    {!!Form::close()!!}		
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

