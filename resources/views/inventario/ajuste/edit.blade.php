@extends ('layouts.admin')
@section ('contenido')

<div class="container-fluid">
    <ul class="breadcrumb">
        <li><a href="#">Inicio</a></li>
        <li><a href="{{url('inventario/producto')}}">Lista de Productos</a></li>
        <li class="active">Editar Producto</li>
    </ul>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
            <h4><i class='fa fa-edit'></i> Editar Producto: {{ $producto->nombre_pro}} - Cod.:{{ $producto->codigo_pro}}</h4>
        </div>
        <div class="panel-body">
            {!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->id_pro]])!!}
            {{Form::token()}}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-5 col-sm-5 col-md-5 col-sx-12">
                        <div class="form-group">
                            <label for="nombre_pro">Nombre Producto</label>
                            <input type="text" name="nombre_pro" class="form-control" value="{{ $producto->nombre_pro}}" placeholder="Nombre Producto...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-sx-12">
                        <div class="form-group">
                            <label for="descripcion_pro">Descripción</label>
                            <textarea name="descripcion_pro" class="form-control">{{ $producto->descripcion_pro}}</textarea>

                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-sx-12">
                        <div class="form-group">
                            <label for="iva_pro">Iva</label>
                            <select class="form-control "  id="iva_pro" required="" value="{{ $producto->iva_pro}}" name="iva_pro">
                                <option value="{{ $producto->iva_pro}}" selected>
                                    <?php
                                    if ($producto->iva_pro == 1) {
                                        echo "SI";
                                    } else {
                                        if ($producto->iva_pro == 2) {
                                            echo "NO";
                                        }
                                    }
                                    ?>
                                </option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-sm-3 col-md-3 col-sx-12">
                        <div class="form-group">
                            <label for="costo_pro">Costo</label>
                            <input type="text" name="costo_pro" class="form-control" value="{{ $producto->costo_pro}}"placeholder="Costo Producto...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-sx-12">
                        <div class="form-group">
                            <label for="pvp_pro">PVP</label>
                            <input type="text" name="pvp_pro" class="form-control" value="{{ $producto->pvp_pro}}"placeholder="PVP Producto...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-sx-12">
                        <div class="form-group">
                            <label for="estado_pro">Estado</label>
                            <select class="form-control "  id="estado_pro" required="" name="estado_pro">
                                <option value="{{ $producto->estado_pro}}" selected>
                                    <?php
                                    if ($producto->estado_pro == "A") {
                                        echo "ACTIVO";
                                    } else {
                                        if ($producto->estado_pro == "I") {
                                            echo "INACTIVO";
                                        }
                                    }
                                    ?>
                                </option>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <a href="{{url('inventario/producto')}}" class="btn btn-danger">Cancelar</a>
                </div>
                {!!Form::close()!!}		
            </div>
        </div>
    </div>
</div>


@endsection