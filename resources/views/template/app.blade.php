<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
    <body>
        <div>
            <a class="navbar-brand" href="{{url('/pessoas/index')}}">Agenda</a>
        </div>
        <div class="container-fluid" >
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Contatos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/pessoas/novo')}}">Novo</a></li> 
                        <li><a href="{{url('/pessoas/listar')}}">Listar Contatos</a></li>                  
                    </ul>
                </li>
            </ul>
        </div>
        
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>