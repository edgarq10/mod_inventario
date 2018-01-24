@extends ('layouts.admin')
@section ('contenido')
<div class="container">


    <div class="row">


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Nuevo producto</a></li>
            </ul>
            <h3>Nuevo Producto</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {!!Form::open(array('url'=>'inventario/producto','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
                <label for="codigo_pro">Codigo Pro</label>
                <input type="text" name="codigo_pro" class="form-control" placeholder="Nombre del producto...">
            </div>
            <div class="form-group">
                <label for="nombre_pro">Nombre Producto</label>
                <input type="text" name="nombre_pro" class="form-control"  placeholder="Nombre Producto...">
            </div>

            <div class="form-group">
                <label for="descripcion_pro">Descripcion</label>
                <input type="text" name="descripcion_pro" class="form-control" placeholder="Descripcion Producto...">
            </div>
            <div class="form-group">
                <label for="iva_pro">Iva</label>
                <select class="form-control "  id="iva_pro" required="" name="iva_pro">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="costo_pro">Costo</label>
                <input type="text" name="costo_pro" class="form-control" onkeypress="return esMoney();" placeholder="Costo Producto...">
            </div>
            <div class="form-group">
                <label for="pvp_pro">PVP</label>
                <input type="text" name="pvp_pro" class="form-control" onkeypress="return esMoney();" placeholder="PVP Producto...">
            </div>
            <div class="form-group">
                <label for="estado_pro">Estado</label>
                <select class="form-control "  id="estado_pro" required="" name="estado_pro">
                    <option value="A">Activo</option>
                    <option value="I">Inactivo</option>
                </select>
            </div>




            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

            {!!Form::close()!!}		

        </div>
    </div>
</div>
@endsection

