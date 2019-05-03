@extends("template.app")
@section("content")
<style>
    .btn-action{
        padding: 5px;
        margin-left:15px;
        margin-right:-8px;
        margin-top:-4px;
        float: right;
    }
</style>

<html>
<head>
</head>
    <body>
        <div>
            <div class="col-md-12" style="padding-bottom: 30px;">
                @foreach(range('A', 'Z') as $letras)
                    <div class="btn-group">
                        <a href="{{ url('pessoas/' . $letras) }}" class="btn btn-primary {{ $letras === $criterio ? 'disabled' : ' ' }} " >{{$letras}}</a>
                    </div>
                @endforeach
            </div>   

            <div class="row">
                <h1 class="col-sm-9">Critério: {{$criterio}}</h1>  
                <form action="{{ url('/pessoas/busca') }}" method="post">
                    <div class="col-sm-3 input-group">
                    {{csrf_field()}}
                        <input type="text" class="form-control" name ="criterio" placeholder="Buscar por...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">OK</button>
                        </span>
                    </div>
                </form>
            </div>

            @foreach($pessoas as $pessoa)
                <div class="col-md-3 ">    
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <strong>{{$pessoa->nome}}</strong> 
                            <a href=" {{ url("/pessoas/$pessoa->id/excluir") }}" class="btn btn-xs btn-danger btn-action">
                                <i class="glyphicon glyphicon-trash" ></i>
                            </a>
                            <a href=" {{ url("/pessoas/$pessoa->id/editar") }}" class="btn btn-xs btn-primary btn-action">
                                <i class="glyphicon glyphicon-pencil" ></i>
                            </a>
                        </div>
                        @foreach($pessoa->telefone as $tel)
                        <div class="panel-body"> 
                            <strong>Tel: </strong>({{ $tel->ddd }}) {{$tel->fone }}
                        </div>
                </div>
                        @endforeach
                </div>
            @endforeach
        </div>       
    </body>

</html>

@endsection