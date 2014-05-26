@extends('masterlayout')
@section('subtitle')
    Álbumes
@stop
@section('content')

 {{ Datatable::table()
    ->addColumn('Nombre', 'Descripción', 'Año', 'Acciones')  
    ->setUrl(URL::to('/albums/datatables')) //La ruta que trae el json que carga la tabla
    ->setOptions(array('aLengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'Todos']])) //define cuántos registros mostrar
    ->setOptions(array('oLanguage' => array(
            'sProcessing' => 'Procesando...',
            'sLengthMenu' => 'Mostrar _MENU_ registros',
            'sZeroRecords' => 'No se encontraron resultados',
            'sInfo' => 'Mostrando desde _START_ hasta _END_ de _TOTAL_ registros',
            'sInfoEmpty' => 'Mostrando desde 0 hasta 0 de 0 registros',
            'sInfoFiltered' => '(filtrado de _MAX_ registros en total)',
            'sInfoPostFix' => '',
            'sSearch' => 'Buscar:',
            'sUrl' => '', 'oPaginate' => array('sFirst' => 'Primero', 'sPrevious' => 'Anterior', 'sNext' => 'Siguiente', 'sLast' => '&Uacute;ltimo')
        )
      )
    )
    ->setClass('tbl-albums') //con esto se le da un selector a la tabla, sirve para utilizarla más adelante con cualquier evento, ej: onclick.
    ->render() }}
@stop