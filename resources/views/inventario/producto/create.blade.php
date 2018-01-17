@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
            <input type="text" name="nombre_pro" class="form-control" placeholder="Nombre Producto...">
        </div>
        
          <div class="form-group">
            <label for="descripcion_pro">Descripcion</label>
            <input type="text" name="descripcion_pro" class="form-control" placeholder="Descripcion Producto...">
        </div>
        <div class="form-group">
            <label for="iva_pro">Iva</label>
            <input type="text" name="iva_pro" class="form-control" placeholder="IVA Producto...">
        </div>
        <div class="form-group">
            <label for="costo_pro">Costo</label>
            <input type="text" name="costo_pro" class="form-control" placeholder="Costo Producto...">
        </div>
        <div class="form-group">
            <label for="pvp_pro">PVP</label>
            <input type="text" name="pvp_pro" class="form-control" placeholder="PVP Producto...">
        </div>
        <div class="form-group">
            <label for="estado_pro">Estado</label>
            <input type="text" name="estado_pro" class="form-control" placeholder="Estado Producto...">
        </div>
       

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>

        {!!Form::close()!!}		

    </div>
</div>
@endsection

