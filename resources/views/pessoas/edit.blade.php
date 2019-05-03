@extends('template.app')

@section('content')

<html> 
<head></head>
    <body>
        <div class="col-md-12">
            <h3>Editar Contato</h3>
        </div>

        <div class="col-md-6 well">
            <form class="col-md-12" action="{{url('/pessoas/editar')}}" method="POST">
            {{csrf_field()}}
                <input type="hidden" name="id" value="{{$pessoa->id}}">
                <div class="form-group col-md-12 {{$errors->has('nome') ? 'has-error' : '' }}">
                    <label class="control-label">Nome</label>
                    <input type="text" value="{{$pessoa->nome}}" name="nome" class="form-control" placeholder="Nome">   
                    @if($errors->has('nome'))   
                        <span class="help-block">
                            {{$errors->first('nome')}}
                        </span>
                     @endif  
                </div>
              
                <div class="col-md-12">
                    <button style="margin-top: 5px; float:right" type="submit" class=" btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>

        <div class="col-md-3 ">    
            <div class="panel panel-info">
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

    </body>
</html> 

@endsection