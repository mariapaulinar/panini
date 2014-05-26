@extends('masterlayout')
@section('subtitle')
    Álbum: {{ $album->name }}
@stop
@section('content')
<div class="panel-group" id="accordion">
     @foreach($sections as $section)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="albumsection" data-sectionid="{{ $section->id }}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $section->id }}">{{ $section->name }} ({{ $section->sheets }})</a> <a class="btn btn-default btn-xs" href="{{ URL::to('/sections/edit', $section->id) }}"><span class="glyphicon glyphicon-pencil"></span></a><a class="btn btn-default btn-xs" href="{{ URL::to('/sections/remove', $section->id) }}"><span class="glyphicon glyphicon-trash"></span></a><a class="btn btn-default btn-xs" href="{{ URL::to('/sheets/create', $section->id) }}"><span class="glyphicon glyphicon-plus"></span> Agregar hoja</a>
                </h4>
            </div>
            <div id="collapse{{ $section->id }}" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div id="contentsection{{ $section->id }}"></div>
                </div>
            </div>
        </div>
     @endforeach
</div>
<hr />
<a class="btn btn-success btn-lg" href="{{ URL::to('/sections/create', $album->id) }}">Nueva sección</a>
@stop
@section('scripts')
<script>
    $(document).ready(function(){
        $('.collapse').collapse();
        $('.albumsection').on('click', function(){
            var sectionid = $(this).data('sectionid');
            var url = '{{ URL::to("/sheets/show") }}' + '/' + sectionid;
            $.ajax({
                type: 'get',
                url: url,
                dataType: 'html',
                async: false,
                success: function(response){
                    $('#contentsection' + sectionid).html(response);
                }
            });
        });
        
        $(document).on('click','.pagination a', function (e) {
            e.preventDefault();
            var sectionid = $(this).closest('div').attr('id');
            if ( $(this).attr('href') != '#' ) {
                $(this).closest('div').animate({ scrollTop: 0 }, 'fast');
                $('#' + sectionid).load($(this).attr('href'));
                
            }
        });
    });
</script>
@stop