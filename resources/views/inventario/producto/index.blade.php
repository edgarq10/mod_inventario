@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Productos<a href="{{url('inventario/producto/create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('inventario.producto.search')
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th>Id</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Iva</th>
                <th>Costo</th>
                <th>PVP</th>
                <th>Estado</th>
                <th>Opciones</th>
                </thead>
                @foreach ($productos as $pro)
<?php
                if ($pro->iva_pro == 1) {
                    $iva = "Si";
                } else if ($pro->iva_pro == 2) {
                    $iva = "No";
                }

                if ($pro->estado_pro == "A") {
                    $estado = "A";
                    $titleEstado="Activo";
                } else if ($pro->estado_pro == "I") {
                    $estado = "I";
                     $titleEstado="Inactivo";
                }
                ?>
                <tr>
                   
                    <td>{{ $pro->id_pro}}</td>
                    <td>{{ $pro->codigo_pro}}</td>
                    <td>{{ $pro->nombre_pro}}</td>
                    <td>{{ $pro->descripcion_pro}}</td>
                    <td title="<?php echo $iva;?>"><?php echo $iva; ?></td>
                    <td>{{ $pro->costo_pro}}</td>
                    <td>{{ $pro->pvp_pro}}</td>
                     <td title="<?php echo $titleEstado;?>"><?php echo $estado; ?></td>
                    <td>
                        <a href="{{URL::action('ProductoController@edit',$pro->id_pro)}}"><button class="btn btn-info">Editar</button></a>
                        <!--<a href="" data-target="#modal-delete-{{$pro->id_pro}}" data-toggle="modal"><button class="btn btn-danger">Cambiar</button></a>-->
                    </td>
                </tr>
                @include('inventario.producto.modal')
                @endforeach
            </table>
        </div>
        {{$productos->render()}}
    </div>
</div>

@endsection
