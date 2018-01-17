@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo Usuario</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'inventario/usuario','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="cedula">Cédula/RUC/Pasaporte</label>
            <input type="text" name="cedula" class="form-control" placeholder="Cédula">
        </div>
        <div class="form-group">
            <label for="name">Nombres y Apellidos</label>
            <input type="text" name="name" class="form-control" placeholder="Escriba sus Nombres y Apellidos">
        </div>
        <div class="form-group">
            <label for="fechaNac">Fecha de Nacimiento</label>
            <input type="date" name="fechaNac" class="form-control" placeholder="Fecha de Nacimiento">
        </div>
        <div class="form-group">
            <label for="ciudadNac">Ciudad de Nacimiento</label>
            <input type="text" name="ciudadNac" class="form-control" placeholder="Escriba la ciudad de Nacimiento">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" placeholder="Escriba su Dirección">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" class="form-control" placeholder="Escriba su número de teléfono">
        </div>
        <div class="form-group">

            <select class="form-control " id="tipo" name="tipo">
                <option value="1">A</option>
                <option value="2">Inactivo</option>

            </select>

            
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email...">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="Contraseña...">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>

        {!!Form::close()!!}		

    </div>
</div>
@endsection

