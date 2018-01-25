@extends ('layouts.admin')
@section ('contenido')


<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="btn-group pull-right">
                <a href="{{url('inventario/usuario/create')}}"> <button class="btn btn-success"> <i class="fa fa-user-plus"> Nuevo Bodeguero</i></button></a></div>
            <h4><i class='fa fa-user'></i> Lista  de Bodegueros</h4>
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
                            <th>ID</th>
                            <th>CI/RUC/Pasaporte</th>
                            <th>Tipo</th>
                            <th>Nombres</th>
                            <th>Fecha_N</th>
                            <th>Ciudad_N</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                            <th>E-mail</th>
                            <th>Opciones</th>
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
                            } else if ($usu->estado == "I") {
                                $estado = "Inactivo";
                                $titleEstado = "Inactivo";
                            }
                            ?>
                            <tr>
                                <td>{{ $usu->id}}</td>
                                <td>{{ $usu->cedula}}</td>
                                <td>{{ $tipo}}</td>
                                <td>{{ $usu->name}}</td>
                                <td>{{ $usu->fechaNac}}</td>
                                <td>{{ $usu->ciudadNac}}</td>
                                <td>{{ $usu->direccion}}</td>
                                <td>{{ $usu->telefono}}</td>
                                <td title="<?php echo $titleEstado; ?>"><?php echo $estado; ?></td>
                                <td>{{ $usu->email}}</td>
                                <td>
                                    <!--                        <div class="dropdown">
                                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Opciones
                                                                    <span class="caret"></span></button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a href="{{URL::action('UsuarioController@edit',$usu->id)}}">Editar</a></li>
                                                                    <li><a href="" data-target="#modal-delete-{{$usu->id}}">Eliminar</a></li>
                                                                 
                                                                </ul>
                                                            </div>-->

                                    <a href="{{URL::action('UsuarioController@edit',$usu->id)}}"  title="Editar"> <button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                                    <!--<a href="" data-target="#modal-delete-{{$usu->id}}" title="Eliminar" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>-->
                                </td>
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
