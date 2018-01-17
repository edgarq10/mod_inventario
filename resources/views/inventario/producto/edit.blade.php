@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Producto: {{ $producto->nombre_pro}}</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
       
        {!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->id_pro]])!!}
        {{Form::token()}}
             <div class="form-group">
            <label for="codigo_pro">Codigo Pro</label>
            <input type="text" name="codigo_pro" class="form-control" value="{{ $producto->nombre_pro}}" placeholder="Nombre del producto...">
        </div>
        <div class="form-group">
            <label for="nombre_pro">Nombre Producto</label>
            <input type="text" name="nombre_pro" class="form-control" value="{{ $producto->nombre_pro}}" placeholder="Nombre Producto...">
        </div>
        
          <div class="form-group">
            <label for="descripcion_pro">Descripcion</label>
            <input type="text" name="descripcion_pro" class="form-control"  value="{{ $producto->descripcion_pro}}" placeholder="Descripcion Producto...">
        </div>
        <div class="form-group">
            <label for="iva_pro">Iva</label>
            <input type="text" name="iva_pro" class="form-control" value="{{ $producto->iva_pro}}" placeholder="IVA Producto...">
        </div>
        <div class="form-group">
            <label for="costo_pro">Costo</label>
            <input type="text" name="costo_pro" class="form-control" value="{{ $producto->costo_pro}}"placeholder="Costo Producto...">
        </div>
        <div class="form-group">
            <label for="pvp_pro">PVP</label>
            <input type="text" name="pvp_pro" class="form-control" value="{{ $producto->pvp_pro}}"placeholder="PVP Producto...">
        </div>
        <div class="form-group">
            <label for="estado_pro">Estado</label>
            <input type="text" name="estado_pro" class="form-control" value="{{ $producto->estado_pro}}" placeholder="Estado Producto...">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>

        {!!Form::close()!!}		

    </div>
</div>
@endsection