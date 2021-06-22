<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bancos;
use App\Models\Saques;

class SaquesController extends Controller
{
    public function inserir(){

        $bancos = Bancos::select('id', 'nome')->where('correntista', 's')->get();
        // dd($categorias);

        return view('app.saques', compact('bancos'));

    }

    public function salvar(Request $request){
        $dados = $request->all();

        $dados['data_hora'] = "{$dados['data']} {$dados['hora']}";
        $s = Saques::create($dados);

        return redirect(route('saques.inserir'));
    }
}
