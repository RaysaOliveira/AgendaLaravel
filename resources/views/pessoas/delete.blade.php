@extends('template.app')

@section('content')

    <div class="col-md-6 well">
        <div class="col-md-12">
            <h3>Deseja realmente excluir este contato?</h3>
            <div style="float:right">
                <a class="btn btn-default" href="{{ url("pessoas") }}">
                    <i class="glyphicon glyphicon-arrow-left"> </i>
                      Cancelar
                </a>
                <a class="btn btn-danger" href="{{ url("pessoas/$pessoa->id/destroy") }}">
                    <i class="glyphicon glyphicon-remove"> </i>
                      Excluir
                </a>
            </div>
        </div>    
    </div>

    <div class="col-md-3 ">    
        <div class="panel panel-danger">
            <div class="panel-heading">
                <strong>{{$pessoa->nome}}</strong> 
            </div>
            @foreach($pessoa->telefone as $tel)
            <div class="panel-body">
                <strong>Tel: </strong>({{ $tel->ddd }}) {{$tel->fone }}
            </div>
            @endforeach
        </div>
    </div>    

@endsection
