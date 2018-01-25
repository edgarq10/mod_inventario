@extends ('layouts.admin')
@section ('contenido')


<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="btn-group pull-right">
                <a href=""> <button class="btn btn-success"> <i class="fa fa-print"> Imprimir</i></button></a></div>
            <h4><i class='fa fa-cog'></i> Nuevo Ajuste</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class=" col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <!--@include('inventario.usuario.search')-->
                </div>
            </div>


            <div class="form-group row">

                <div class="col-md-3 col-lg-3">
                    <div class="input-group">
                        <span class="input-group-addon">N° Ajuste</span>
                        <input type="text" class="form-control input-sm" onkeypress="return esDigito();" id="" name="" required=""  placeholder="Número de Ajuste">
                    </div>
                </div>

                <div class="col-md-3  ">
                    <div class="input-group  ">
                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>Fecha</span>
                        <input type="date"  class="form-control input-sm" id=""  placeholder="Fecha" required>

                    </div>
                </div>
            </div>

            <div class="form-group">
      <label for="email">Motivo Ajuste:</label>
      <input type="text" class="form-control" id="" placeholder="Motivo Ajuste" name="">
    </div>
    
                 <div class="row">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-sx-12">
                        <div class="form-group">
                            <label for="tipo_id">Producto</label>
                            <select class="form-control " id="tipo_id"  name="tipo_id">
                                <option value="1">Seleccione Un Producto</option>
                             
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-1 col-md-1 col-sx-12">
                        <div class="form-group">
                            <label for="cedula">Stock</label>
                            <input type="text" name="cedula" class="form-control" id="cedula" required  readonly="" maxlength="13" minlength="10" >

                        </div>
                    </div>
                   
                     <div class="col-lg-1 col-sm-1 col-md-1 col-sx-12">
                        <div class="form-group">
                            <label for="cedula">IVA</label>
                            <input type="text" name="cedula" class="form-control" id="cedula" required  readonly="" maxlength="13" minlength="10" >
                        </div>
                    </div>
                     
                     <div class="col-lg-1 col-sm-1 col-md-1 col-sx-12">
                        <div class="form-group">
                            <label for="cedula">Estado</label>
                            <input type="text" name="cedula" class="form-control" id="cedula" required  readonly="" maxlength="13" minlength="10" >
                        </div>
                    </div>
                       <div class="col-lg-2 col-sm-2 col-md-2 col-sx-12">
                        <div class="form-group">
                            <label for="cedula">PVP</label>
                            <input type="text" name="cedula" class="form-control" id="cedula" required   maxlength="13" minlength="10" >
                        </div>
                    </div>
                     <div class="col-lg-2 col-sm-2 col-md-2 col-sx-12">
                        <div class="form-group">
                            <label for="cedula">Cantidad</label>
                            <input type="text" name="cedula" class="form-control" id="cedula" required   maxlength="13" minlength="10" >
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-md-2 col-sx-12">
                        <div class="form-group">
                            <label>Agregar</label>
                            <button type="button" class="btn btn-success form-control" ><i class="fa fa-cart-plus"></i> Agregar</button>

                        </div>
                    </div>
                </div>


        </div>
    </div>
</div>







@endsection
