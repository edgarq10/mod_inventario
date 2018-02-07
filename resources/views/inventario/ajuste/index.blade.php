@extends ('layouts.admin')
@section ('contenido')
<ul class="breadcrumb">
    <li><a href="#">Inicio</a></li>
    <li class="active">Lista de ajustes</li>
</ul>

<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="btn-group pull-right">
                <a href="{{url('inventario/ajuste/create')}}"> <button class="btn btn-success"> <i class="fa fa-plus"> Nuevo ajuste</i></button></a></div>
            <h4><i class='fa fa-barcode'></i> Lista  de ajustes</h4>
        </div>
        <div class="panel-body">

            <div class="row">
                <div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-md-offset-1">

                    @include('inventario.ajuste.search')
                </div>
            </div>

            <div class="row">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                        <th class="text-center">Opciones</th>
                        <th>Nº</th>
                        <th>Motivo</th>
                        <th>Fecha</th>
                        <th>Estado impresión</th>
                        
                        </thead>
                        @foreach ($ajustes as $ajus)
                        <?php
//                        if ($pro->iva_pro == 1) {
//                            $iva = "Si";
//                        } else if ($pro->iva_pro == 2) {
//                            $iva = "No";
//                        }
//
//                        if ($pro->estado_pro == "A") {
//                            $estado = "Activo";
//                            $titleEstado = "Activo";
//                            $class="label label-success";
//                        } else if ($pro->estado_pro == "I") {
//                            $estado = "Inactivo";
//                            $titleEstado = "Inactivo";
//                            $class="label label-danger";
//                        }
                        ?>
                        <tr>
                            <td class="text-center">
                                <a href="{{URL::action('AjusteController@edit',$ajus->id_ajuste)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                                <!--<a href="" data-target="#modal-delete-{{$pro->id_pro}}" data-toggle="modal"><button class="btn btn-danger">Cambiar</button></a>-->
                            </td>
                            <td>{{ $ajus->numero_ajuste}}</td>
                            <td>{{ $pro->motivo_ajuste}}</td>
                            <td>{{ $pro->fecha_ajuste}}</td>
                            <td  title="<?php echo $titleEstado; ?> " class="text-center"><span class=" <?php echo $class;?> "><?php echo $estado; ?></span></td>
                        </tr>
                        @include('inventario.ajuste.modal')
                        @endforeach
                    </table>
                </div>
                {{$ajustes->render()}}
            </div>
        </div>
    </div>
</div>

@endsection
