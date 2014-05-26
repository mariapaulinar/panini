@extends('masterlayout')
@section('subtitle')
    Nueva hoja para la sección: {{ $section->name }}
@stop
@section('content')
<div class="panel-body">
    
    {{ Form::open(array('url' => '/sheets/store', 'class' => 'form-horizontal')) }}
        {{ Form::hidden('sectionid', $section->id) }}
        <div class="form-group">
            {{ Form::label('image', 'URL de la imagen*', array('class' => 'control-label col-md-2')) }}
            <div class="col-md-7">
                {{ Form::text('image', '', array('class' => 'form-control')) }}
                @if($errors->has('image'))
                <span class="text-danger help-inline"><span class="glyphicon glyphicon-warning-sign"></span> {{ $errors->first('image') }}</span>
                @endif
            </div>
            
        </div>
        
        <div class="form-group">
            {{ Form::label('content', 'Contenido*', array('class' => 'control-label col-md-2')) }}
            <div class="col-md-7">
                {{ Form::textarea('content', '', array('class' => 'form-control')) }}
                @if($errors->has('content'))
                <span class="text-danger help-inline"><span class="glyphicon glyphicon-warning-sign"></span> {{ $errors->first('content') }}</span>
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
        location.href = '{{URL::to("/sections/show", $section->albumid)}}';
    });
</script>
@stop