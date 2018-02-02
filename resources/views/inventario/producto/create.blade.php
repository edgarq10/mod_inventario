@extends ('layouts.admin')
@section ('contenido')
<div class="container-fluid">
    <ul class="breadcrumb">
        <li><a href="#">Inicio</a></li>
        <li><a href="{{url('inventario/producto')}}">Lista de Productos</a></li>
        <li class="active">Nuevo producto</li>
    </ul>
    @if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4><i class='fa fa-plus'></i> Nuevo Producto - COD.: <?php echo $cod_pro; ?></h4>
            </div>
            <div class="panel-body">
                {!!Form::open(array('url'=>'inventario/producto','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-5 col-sm-5 col-md-5 col-sx-12">
                            <div class="form-group">
                                <label for="nombre_pro">Nombre Producto</label>
                                <input type="text" name="nombre_pro" class="form-control"  value="{{old('nombre_pro')}}" required="" maxlength="50" placeholder="Nombre Producto...">
                            </div>
                        </div>
                         <div class="col-lg-3 col-sm-3 col-md-3 col-sx-12"> 
                            <div class="form-group">
                                <label for="costo_pro">Costo</label>
                                <input type="text" name="costo_pro" class="form-control" required="true" value="{{old('costo_pro')}}" onkeypress="return esMoney();" placeholder="Costo Producto...">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3 col-sx-12"> 
                            <div class="form-group">
                                <label for="pvp_pro">PVP</label>
                                <input type="text" name="pvp_pro" class="form-control"  required="true" value="{{old('pvp_pro')}}" onkeypress="return esMoney();" placeholder="PVP Producto...">
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-sm-5 col-md-5 col-sx-12"> 
                            <div class="form-group">
                                <label for="u_medida">Unidad Medida</label>
                                <select class="form-control "  id="u_medida" required="" name="u_medida">
                                    <option  value="">Seleccione unidad de medida</option>
                                    @foreach ($unidad_medida as $u_medida)
                                    <option value="{{$u_medida->id_unidMedida}}">{{$u_medida->nombre_unidMedida }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3 col-sx-12"> 
                            <div class="form-group">
                                <label for="iva_pro">Iva</label>
                                <select class="form-control "  id="iva_pro" required="" name="iva_pro">
                                    <option selected=""  value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                          
                        <div class="col-lg-3 col-sm-3 col-md-3 col-sx-12"> 
                            <div class="form-group">
                                <label for="estado_pro">Estado</label>
                                <select class="form-control "  id="estado_pro" required="" name="estado_pro">
                                    <option selected="" value="A">Activo</option>
                                    <option value="I">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-5 col-md-5 col-sx-12">
                            <div class="form-group">
                                <label for="descripcion_pro">Descripción</label>
                                <textarea name="descripcion_pro" class="form-control"  value="{{old('descripcion_pro')}}" placeholder="Descripción Producto..."></textarea>
                                <!--<input type="text" name="descripcion_pro" class="form-control"  value="{{old('descripcion_pro')}}" placeholder="Descripción Producto...">-->
                            </div>
                        </div>
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>

                    {!!Form::close()!!}		
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

