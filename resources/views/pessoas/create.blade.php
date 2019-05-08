@extends('template.app')

@section('content')

<html> 
<head></head>
    <body>
        <div class="col-md-12">
            <h3>Novo Contato</h3>
        </div>

        <div class="col-md-6 well">
            <form class="col-md-12" action="{{url('/pessoas/store')}}" method="POST">
            {{csrf_field()}}
                <div class="form-group col-md-12 {{$errors->has('nome') ? 'has-error' : '' }}">
                    <label class="control-label">Nome</label>
                    <input type="text" name="nome" value="{{old('nome')}}" class="form-control" placeholder="Nome">   
                     @if($errors->has('nome'))   
                        <span class="help-block">
                            {{$errors->first('nome')}}
                        </span>
                     @endif
                </div>

                <div class="form-group col-md-3 {{$errors->has('ddd') ? 'has-error' : '' }}">
                    <label class="control-label">DDD</label>
                    <input type="text" name="ddd" value="{{old('ddd')}}" class="form-control" placeholder="DDD"> 
                    @if($errors->has('ddd'))   
                        <span class="help-block">
                            {{$errors->first('ddd')}}
                        </span>
                     @endif    
                </div>

                <div class="form-group col-md-9 {{$errors->has('fone') ? 'has-error' : '' }}">
                    <label class="control-label">Telefone</label>
                    <input type="text" name="fone" value="{{ old('fone') }}" class="form-control" placeholder="Telefone"> 
                    @if($errors->has('fone'))   
                        <span class="help-block">
                            {{$errors->first('fone')}}
                        </span>
                     @endif    
                </div>
                <div class="col-md-9">
                    <button style="margin-top: 5px; margin-left:405px;" type="submit" class=" btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </body>
</html>    
@endsection