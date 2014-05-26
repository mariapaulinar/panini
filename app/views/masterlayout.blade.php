<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panini CRUD</title>
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'); }}
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css'); }}
    {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css'); }}
    
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'); }}
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js'); }}
    {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'); }}
    
    <style>
        body {
                width: 800px;
                margin: 50px auto;
        }
        .badge {
                float: right;
        }
    </style>
</head>
<body>
    <h1>Panini CRUD</h1>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Codetag - Prueba técnica</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('/albums/show') }}">Álbumes</a></li>
                    <li><a href="{{ URL::to('/albums/create') }}">Nuevo álbum</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
    <div class="panel panel-warning">
        <div class="panel-heading">
                <h4>@yield('subtitle')</h4>
        </div>

        <div class="panel-body">
            @yield('content')
        </div>
    </div>
    @yield('scripts')
</body>
</html>