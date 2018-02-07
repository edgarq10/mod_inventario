@extends ('layouts.admin')
@section ('contenido')
<ul class="breadcrumb">
    <li><a href="#">Inicio</a></li>
    <li class="active">Lista de productos</li>
</ul>

<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="btn-group pull-right">
                <a href="{{url('inventario/producto/create')}}"> <button class="btn btn-success"> <i class="fa fa-plus"> Nuevo Producto</i></button></a></div>
            <h4><i class='fa fa-barcode'></i> Lista  de Productos</h4>
        </div>
        <div class="panel-body">

            <div class="row">
                <div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-md-offset-1">

                    @include('inventario.producto.search')
                </div>
            </div>

            <div class="row">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                        <th class="text-center">Opciones</th>
                        
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Unidad Medida</th>
                        <th>Descripción</th>
                        <th class="text-center">Iva</th>
                        <th class="text-center">Stock</th>
                        <th class="text-right">Costo</th>
                        <th class="text-right">PVP</th>
                        <th class="text-center">Estado</th>

                        </thead>
                        @foreach ($productos as $pro)
                        <?php
                        if ($pro->iva_pro == 1) {
                            $iva = "Si";
                        } else if ($pro->iva_pro == 2) {
                            $iva = "No";
                        }

                        if ($pro->estado_pro == "A") {
                            $estado = "Activo";
                            $titleEstado = "Activo";
                            $class="label label-success";
                        } else if ($pro->estado_pro == "I") {
                            $estado = "Inactivo";
                            $titleEstado = "Inactivo";
                            $class="label label-danger";
                        }
                        ?>
                        <tr>
                            <td class="text-center">
                                <a href="{{URL::action('ProductoController@edit',$pro->id_pro)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                                <!--<a href="" data-target="#modal-delete-{{$pro->id_pro}}" data-toggle="modal"><button class="btn btn-danger">Cambiar</button></a>-->

                            </td>

                            
                            <td>{{ $pro->codigo_pro}}</td>
                            <td>{{ $pro->nombre_pro}}</td>
                            <td>{{ $pro->nombre_unidMedida }}</td>
                            <td>{{ $pro->descripcion_pro}}</td>
                            <td class="text-center" title="<?php echo $iva; ?>"><?php echo $iva; ?></td>
                            <td class="text-center">{{ $pro->stock_pro}}</td>
                            <td class="text-right">{{ $pro->costo_pro}}</td>
                            <td class="text-right">{{ $pro->pvp_pro}}</td>
                            <td  title="<?php echo $titleEstado; ?> " class="text-center"><span class=" <?php echo $class;?> "><?php echo $estado; ?></span></td>

                        </tr>
                        @include('inventario.producto.modal')
                        @endforeach
                    </table>
                </div>
                {{$productos->render()}}
            </div>
        </div>
    </div>
</div>

@endsection
