@extends('masterlayout')
@section('subtitle')
    Nueva sección para el álbum: {{ $album->name }}
@stop
@section('content')
<div class="panel-body">
    
    {{ Form::open(array('url' => '/sections/store', 'class' => 'form-horizontal')) }}
        {{ Form::hidden('albumid', $album->id) }}
        <div class="form-group">
            {{ Form::label('order', 'Orden*', array('class' => 'control-label col-md-2')) }}
            <div class="col-xs-2">
                {{ Form::text('order', '', array('class' => 'form-control')) }}
                @if($errors->has('order'))
                <span class="text-danger help-inline"><span class="glyphicon glyphicon-warning-sign"></span> {{ $errors->first('order') }}</span>
                @endif
            </div>
            
        </div>
        
        <div class="form-group">
            {{ Form::label('name', 'Nombre*', array('class' => 'control-label col-md-2')) }}
            <div class="col-md-7">
                {{ Form::text('name', '', array('class' => 'form-control')) }}
                @if($errors->has('name'))
                <span class="text-danger help-inline"><span class="glyphicon glyphicon-warning-sign"></span> {{ $errors->first('name') }}</span>
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
        location.href = '{{URL::to("/sections/show", $album->id)}}';
    });
</script>
@stop