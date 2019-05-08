@extends('template.app')

@section('content')
<style>
    .btn-action{
        padding: 5px;
        margin-left:15px;
        margin-right:-8px;
        margin-top:-4px;
        float: right;
    }
</style>

    <div class="col-md-12" style="padding-bottom: 30px;">
        @foreach(range('A', 'Z') as $letras)
            <div class="btn-group">
                <a href="{{ url('pessoas/' . $letras) }}" class="btn btn-primary " >{{$letras}}</a>
            </div>
        @endforeach
    </div>   

    <div class="col-sm-12">
        <form action="{{ url('/pessoas/busca') }}" method="post">
            <div class="col-sm-3 input-group">
            {{csrf_field()}}
                <input type="text" class="form-control" name ="criterio" placeholder="Buscar por..." style="margin-bottom:20px; right:-740px;">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" style="margin-bottom:20px; right:-740px;">OK</button>
                </span>
            </div>
        </form>
    </div>
    
    @foreach($pessoas as $p)
        <div class="col-md-3 ">    
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>{{$p->nome}}</strong> 
                    <a href=" {{ url("/pessoas/$p->id/excluir") }}" class="btn btn-xs btn-danger btn-action">
                        <i class="glyphicon glyphicon-trash" ></i>
                    </a>
                    <a href=" {{ url("/pessoas/$p->id/editar") }}" class="btn btn-xs btn-primary btn-action">
                        <i class="glyphicon glyphicon-pencil" ></i>
                    </a>
                </div>
                  
            </div>
        </div>    
    @endforeach

@endsection
