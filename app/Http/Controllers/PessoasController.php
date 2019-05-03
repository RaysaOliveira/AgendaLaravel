<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use App\Telefone;
use Illuminate\Support\Facades\Validator;

class PessoasController extends Controller
{
    private $telefones_controller;
    private $pessoa;
    private $telefone;

    //injeção de dependencias
    public function __construct(TelefonesController $telefonesController)
    {
        $this->telefones_controller = $telefonesController;
        $this->pessoa = new Pessoa();
        $this->telefone = new Telefone();
    }

    public function index($letra)
    {
        $list_pessoas = Pessoa::indexLetra($letra);
        return view('pessoas.index', [
            'pessoas' => $list_pessoas,
            'criterio' => $letra
        ]);
    }  
    
    public function novoView()
    {
        return view("pessoas.create");
    }

    public function store(Request $request) //request é o form que foi preenchido no html
    {   
        $validacao = $this->validacao($request->all());
        if($validacao->fails()) {
            return redirect()->back()
                ->withErrors($validacao->errors())
                ->withInput($request->all());
        }

        $pessoa = Pessoa::create($request->all());
        if($request->ddd && $request->fone){
            $telefone = new Telefone();
            $telefone->ddd = $request->ddd;
            $telefone->fone = $request->fone;
            $telefone->pessoa_id = $pessoa->id;
            $this->telefones_controller->store($telefone);
        }
        
        return redirect('/pessoas')->with("message", "Contato criado com sucesso!");
    }

    public function editView($id)
    {
        return view("pessoas.edit", [
            'pessoa'=> $this->getPessoa($id)
        ]);
    }

    protected function getPessoa($id)
    {
        return $this->pessoa->find($id);
    }

    public function update(Request $request)
    {
        $validacao = $this->validacao($request->all());
        if($validacao->fails()) {
            return redirect()->back()
                ->withErrors($validacao->errors())
                ->withInput($request->all());
        }
    
        $pessoa = $this->getPessoa($request->id);
        $pessoa->update($request->all());
      
        return redirect('/pessoas/');
    }

    public function busca(Request $request)
    {
        $pessoas = Pessoa::search($request->criterio);
        return view('pessoas.index', [
            'pessoas' => $pessoas, 
            'criterio' => $request->criterio
        ]);
    }

    public function excluirView($id)
    {
        return view ('pessoas.delete', [
            'pessoa' => $this->getPessoa($id)
        ]);
    }

    public function destroy($id)
    {
        $this->getPessoa($id)->delete();
        return redirect(url('pessoas'))->with('Contato excluido!');
    }

    private function validacao($data)
    {
        if(array_key_exists('ddd', $data) && array_key_exists('fone', $data)) 
        {
            if($data['ddd'] || $data['fone'])
            {
                $regras['ddd'] = 'required|size:2';
                $regras['fone'] = 'required';
            }
        }    
        $regras['nome'] = 'required|min:3';

        $msg = [
            'nome.required' => 'O campo nome é obrigatório. ',
            'nome.min' => 'Campo nome deve ter pelo menos 3 letras.',
            'ddd.required' => 'Campo DDD é obrigatório.',
            'ddd.size' => 'O campo DDD deve ter 2 dígitos.',
            'fone.required' => 'O campo telefone é obrigatório.'
        ];

        return Validator::make($data, $regras, $msg);
    }

}
