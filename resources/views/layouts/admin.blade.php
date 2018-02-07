<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mod Inventario</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
         <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
        <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>INV</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Mod Inventario</b></span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Navegación</span>
                    </a>
                    <!-- Navbar Right Menu -->

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <small class="bg-red"></small>
                                    <?php
                                    if ((Auth::user()->id_tipoUsu) == 1) {
                                        $tipo = "Administrador";
                                    } else if ((Auth::user()->id_tipoUsu) == 2) {
                                        $tipo = "Bodeguero";
                                    }
                                    echo $tipo;
                                    ?>      
                                    - <span class="fa fa-user"> {{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="{{asset('img/user.png')}}" class="img-circle" alt="Cinque Terre" width="500" height="500"> 
<!--                                        <p>
                                            <small</small>
                                        </p>-->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="{{ route('logout') }}" class="btn btn-danger btn-flat" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out" ></i>Salir
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            if ((Auth::user()->id_tipoUsu) == 1) {
                ?>
<aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header"></li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span>Configuración</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{url('inventario/usuario')}}"><i class="fa fa-circle-o"></i> Administración Usuarios</a></li>
                                <li><a href="{{url('inventario/producto')}}"><i class="fa fa-circle-o"></i> Administración Productos</a></li>
                                <!--<li><a href="{{url('inventario/bodeguero')}}"><i class="fa fa-circle-o"></i> Administración Bodegueros</a></li>                                                                                                        goria"><i class="fa                                                                                                         fa-circle-o"></i> Administracio                                                                                                        n Productos</a></li>-->
                    </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-th"></i>
                            <span>Gestión</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('inventario/ajuste')}}"><i class="fa fa-circle-o"></i> Lista de Ajuste</a></li>
                            <li><a href="{{url('inventario/ajuste')}}"><i class="fa fa-circle-o"></i> Nuevo Ajuste</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa fa-bar-chart"></i>
                            <span>Reportes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="ventas/venta"><i class="fa fa-circle-o"></i>Consulta stock de producto</a></li>
                            <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i>Reporte de Bodegueros</a></li>
                            <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i>Reporte de Productos con Stock</a></li>
                            <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i>Reporte de Ajustes de Productos</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                            <small class="label pull-right bg-red">PDF</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                            <small class=                                                                                                                                                                                                        "label pull-right bg-yel                                                                                                                                                                                                        low">IT</small>
                        </a>
                    </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
                <?php
            } else if ((Auth::user()->id_tipoUsu) == 2) {
                ?>
<aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header"></li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-barcode"></i>
                                <span>Productos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{url('inventario/producto')}}"><i class="fa fa-circle-o"></i> Lista Productos</a></li>
                                <li><a href="{{url('inventario/producto/create')}}"><i class="fa fa-circle-o"></i> Nuevo Producto</a></li>
                                                                                                                                   goria"><i class="fa                                                                                                         fa-circle-o"></i> Administracio                                                                                                        n Productos</a></li>
                    </ul>
                    </li>
                 
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa fa-bar-chart"></i>
                            <span>Reportes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="ventas/venta"><i class="fa fa-circle-o"></i>Consulta stock de producto</a></li>
                            <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i>Reporte de Bodegueros</a></li>
                            <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i>Reporte de Productos con Stock</a></li>
                            <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i>Reporte de Ajustes de Productos</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                            <small class="label pull-right bg-red">PDF</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                            <small class=                                                                                                                                                                                                        "label pull-right bg-yel                                                                                                                                                                                                        low">IT</small>
                        </a>
                    </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
                <?php
            }
            ?> 
            <!--Contenido-->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Sistema de Inventario</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Contenido-->
                                            @yield('contenido')
                                            <!--Fin Contenido-->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.0
    </div>
    <strong>Copyright &copy; 2018 <a href="">Edgar Quezada</a>.</strong> All rights reserved.
</footer>


<!-- jQuery 2.1.4 -->
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
@stack('scripts')
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/defaults-es_ES.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/app.min.js')}}"></script>
<script src="{{asset('js/validaciones.js')}}"></script>

</body>
</html>
