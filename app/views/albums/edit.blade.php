@extends('masterlayout')
@section('subtitle')
    Editar álbum
@stop
@section('content')
<div class="panel-body">
    
    {{ Form::open(array('url' => '/albums/update', 'class' => 'form-horizontal')) }}
        {{ Form::hidden('id', $album->id) }}
        <div class="form-group">
            {{ Form::label('name', 'Nombre*', array('class' => 'control-label col-md-2')) }}
            <div class="col-md-7">
                {{ Form::text('name', $album->name, array('class' => 'form-control')) }}
                @if($errors->has('name'))
                <span class="text-danger help-inline"><span class="glyphicon glyphicon-warning-sign"></span> {{ $errors->first('name') }}</span>
                @endif
            </div>
            
        </div>
    
        <div class="form-group">
            {{ Form::label('description', 'Descripción*', array('class' => 'control-label col-md-2')) }}
            <div class="col-md-7">
                {{ Form::textarea('description', $album->description, array('class' => 'form-control')) }}
                @if($errors->has('description'))
                <span class="text-danger help-inline"><span class="glyphicon glyphicon-warning-sign"></span> {{ $errors->first('description') }}</span>
                @endif
            </div>
            
        </div>
        
        <div class="form-group">
            {{ Form::label('year', 'Año*', array('class' => 'control-label col-md-2')) }}
            <div class="col-md-7">
                {{ Form::text('year', $album->year, array('class' => 'form-control')) }}
                @if($errors->has('year'))
                <span class="text-danger help-inline"><span class="glyphicon glyphicon-warning-sign"></span> {{ $errors->first('year') }}</span>
                @endif
            </div>
            
        </div>
    
        <div class="form-group">
            {{ Form::label('', '', array('class' => 'control-label col-md-2')) }}
            <div class="col-md-7">
                {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}{{ Form::button('Cancelar', array('class' => 'cancelar btn btn-default-outline')) }}
            </div>
        </div>

    {{ Form::close() }}
    
</div>
<script>
    $('.cancelar').click(function(){
        location.href = '{{URL::to("/albums/show")}}';
    });
</script>
@stop