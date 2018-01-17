

{{Form::close()}}
{!! Form::open(array('url'=>'inventario/usuario','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar..." >    
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary"><span class="fa fa-search" aria-hidden="true"></span>Buscar</button>
            
        </span>
    </div>
</div>
{{Form::close()}}