@extends ('layouts.admin')
@section ('contenido')
<div class="container-fluid">

    @if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="btn-group pull-right">
                <a href=""> <button class="btn btn-success"> <i class="fa fa-print"> Imprimir</i></button></a></div>
            <h4><i class='fa fa-cog'></i> Nuevo Ajuste </h4>
        </div>
        <div class="panel-body">
            <!--            <div class="row">
                            <div class=" col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                @include('inventario.usuario.search')
                            </div>
                        </div>-->
            {!!Form::open(array('url'=>'inventario/ajuste','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="form-group row">
                        <div class="col-md-4 col-lg-3">
                            <div class="input-group">
                                <span class="input-group-addon">N° Ajuste</span>
                                <input type="text" class="form-control input-sm"  id="numero_ajuste" name="numero_ajuste"  readonly value="<?php echo $num_ajuste; ?>"required=""  placeholder="Número de Ajuste">
                                <input type="hidden" class="form-control input-sm"  id="id_usuario" name="id_usuario"  value="{{ Auth::user()->id }}" required="">

                            </div>
                        </div>
                        <div class="col-md-4  ">
                            <div class="input-group  ">
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>Fecha</span>
                                <input type="text"  class="form-control input-sm" id="fecha_ajus" name="fecha_ajus" readonly="" value='<?php echo date("d/m/Y") ?>' placeholder="Fecha" required>
                            </div>
                        </div>
                        <div class="col-md-12  ">
                            <div class="form-group">
                                <label for="email">Motivo Ajuste:</label>
                                <input type="text" class="form-control" id="motivo_ajus" required value="{{old('motivo_ajus')}}" placeholder="Motivo Ajuste" name="motivo_ajus">
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-4 col-sx-12">
                    <div class="form-group">
                        <label for="pidproducto">Seleccione el Producto</label>
                        <select class="form-control selectpicker" id="pidproducto" required name="pidproducto" data-live-search="true">
                            <option value="">Seleccione</option>
                            @foreach($productos as $pro)
                            <option value="{{$pro->id_pro}}_{{$pro->stock_pro}}_{{$pro->iva_pro}}_{{$pro->pvp_pro}}">{{$pro->nombre_prod}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-3 col-md-2 col-sx-12">
                    <div class="form-group">
                        <label for="piva">IVA</label>
                        <input type="text" name="piva" class="form-control" id="piva" required  readonly="" maxlength="13" minlength="10" >
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 col-md-3 col-sx-12">
                    <div class="form-group">
                        <label for="pstock">Stock</label>
                        <input type="text" name="pstock" class="form-control" id="pstock" required  readonly="" maxlength="13" minlength="10" >
                    </div>
                </div>



                <div class="col-lg-2 col-sm-3 col-md-3 col-sx-12">
                    <div class="form-group">
                        <label for="ppvp">PVP</label>
                        <input type="text" name="ppvp" class="form-control" id="ppvp" required  readonly  maxlength="13" minlength="10" >
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 col-md-3 col-sx-12">
                    <div class="form-group">
                        <label for="pcantidad">Cantidad</label>
                        <input type="text" name="pcantidad" class="form-control" id="pcantidad" required   maxlength="13" minlength="10" >
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-3 col-md-3 col-sx-12">
                    <div class="form-group">
                        <label>Tipo Movimiento</label>
                        <select class="form-control" id="tipo_movimiento"  name="tipo_movimiento">
                         
                            <option value="I">Ingreso</option>
                            <option value="S">Salida</option>
                          
                        </select>                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-sx-12">
                    <div class="form-group">
                        <label>Agregar</label>
                        <button type="button" id="btn_add" class="btn btn-success form-control" ><i class="fa fa-cart-plus"> Agregar</i></button>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12 col-sx-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover" >
                        <thead style="background-color: #A9D0F5 ">
                        <th>Opciones</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Tipo Movimiento</th>
                        </thead>
                        <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        </tfoot>
                    </table>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-sx-12" id="guardar">
                    <div class="form-group">
                        <input name="_token" value="{{csrf_token()}}" type="hidden">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>

                    </div>
                </div>
                {!!Form::close()!!}	
            </div>
        </div>
    </div>
</div>
@push ('scripts')
<script>
    $(document).ready(function () {
        $('#btn_add').click(function () {
            agregar();

        });
    });
    var cont = 0;
    total = 0;
    subtotal = [];
//    $('#guardar').hide();
    $("#pidproducto").change(mostarValores);
    function mostarValores()
    {
        datosProducto = document.getElementById('pidproducto').value.split('_');
        $("#pstock").val(datosProducto[1]);
        if (datosProducto[2] == 1) {
            $iva = "Si"
        } else {
            $iva = "Si"
        }
        $("#piva").val($iva);
        $("#ppvp").val(datosProducto[3]);
    }
    function agregar() {
        datosProducto = document.getElementById('pidproducto').value.split('_');
        idproducto = datosProducto[0];
        producto = $("#pidproducto option:selected").text();
        stock = $("$pstock").val();
        iva = $("#piva").val();
        pvp = $("$ppvp").val();
        cantidad = $("#p.cantidad").val();
        if (idproducto != "" && stock != "" && iva != "" && pvp != "" && cantidad > 0 ) {
            if (stock >= cantidad) {
                var fila = '<tr class="selected" id="fila' 
                        +cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar(' 
                        + cont +');">X</button></td> <td><input type="hidden" name="idproducto[]" value="'
                        + idproducto + '">' 
                        + producto + '</td><td><input type="number" name="cantidad[]" value="'+
                        cantidad+'"></td></tr>';
                cont++;
            } else {
                alert("Cantidad supera el stock");
            }
        } else {
        }
    }
    function limpiar() {
        $("#pstock").val("");
        $("#piva").val("");
        $("#ppvp").val("");
        $("#pcantidad").val("");
    }
//    function evaluar() {
//
//    }
</script>

@endpush
@endsection
