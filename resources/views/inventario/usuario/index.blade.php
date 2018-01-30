@extends ('layouts.admin')
@section ('contenido')


<div class="container-fluid">
    <ul class="breadcrumb">
        <li><a href="#">Inicio</a></li>
        <li class="active">Lista de Usuarios</li>
    </ul>
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="btn-group pull-right">
                <a href="{{url('inventario/usuario/create')}}"> <button class="btn btn-success"> <i class="fa fa-user-plus"> Nuevo Usuario</i></button></a></div>
            <h4><i class='fa fa-user'></i> Lista  de Usuarios</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class=" col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    @include('inventario.usuario.search')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <!--<th>ID</th>-->
                            <th class="text-center">Opciones</th>
                            <th class="text-center">CI/RUC/Pasaporte</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Nombres</th>
                            <th class="text-center">Fecha_Nacimiento</th>
                            <th class="text-center">Ciudad_Nacimiento</th>
                            <th class="text-center">Dirección</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">E-mail</th>

                            </thead>
                            @foreach ($usuarios as $usu)
                            <?php
                            if ($usu->id_tipoUsu == 1) {
                                $tipo = "Administrador";
                            } else if ($usu->id_tipoUsu == 2) {
                                $tipo = "Bodeguero";
                            }

                            if ($usu->estado == "A") {
                                $estado = "Activo";
                                $titleEstado = "Activo";
                                $class="label label-success";
                            } else if ($usu->estado == "I") {
                                $estado = "Inactivo";
                                $titleEstado = "Inactivo";
                                $class="label label-danger";
                            }
                            ?>
                            <tr>
                                <!--<td>{{ $usu->id}}</td>-->
                                <td class="text-center">
                                    <a href="{{URL::action('UsuarioController@edit',$usu->id)}}"  title="Editar"> <button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                                    <!--<a href="" data-target="#modal-delete-{{$usu->id}}" title="Eliminar" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>-->
                                </td>
                                <td>{{ $usu->cedula}}</td>
                                <td class="text-center">{{ $tipo}}</td>
                                <td>{{ $usu->name}}</td>
                                <td class="text-center">{{ $usu->fechaNac}}</td>
                                <td>{{ $usu->ciudadNac}}</td>
                                <td>{{ $usu->direccion}}</td>
                                <td >{{ $usu->telefono}}</td>
                                <td class="text-center" title="<?php echo $titleEstado; ?>"><span class=" <?php echo $class;?> "><?php echo $estado; ?></span></td>
                                <td>{{ $usu->email}}</td>
                            </tr>
                            @include('inventario.usuario.modal')
                            @endforeach
                        </table>
                    </div>
                    {{$usuarios->render()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
