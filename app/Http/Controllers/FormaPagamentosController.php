<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FormaPagamentos;


class FormaPagamentosController extends Controller
{
    public function index(){

        $forma_pagamentos = FormaPagamentos::get();

        return view('forma_pagamentos.index', compact('forma_pagamentos'));
        
    }

    public function create(){
        return view('forma_pagamentos.create');
    }

    public function store(Request $request){

        $dados = $request->all();

        // dd($dados);

        FormaPagamentos::create($dados);

        return redirect(route('forma_pagamentos.index'));

    }

    public function edit($id){

        $forma_pagamento = FormaPagamentos::findOrFail($id);

        return view('forma_pagamentos.edit', compact('forma_pagamento'));

    }

    public function update(Request $request){
        
        $dados = $request->all();

        // dd($dados);

        $forma_pagamento = FormaPagamentos::findOrFail($dados['id']);

        $forma_pagamento->update($dados);

        return redirect(route('forma_pagamentos.index'));

    }
}
