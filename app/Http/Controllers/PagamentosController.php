<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorias;
use App\Models\FormaPagamentos;
use App\Models\Pagamentos;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PagamentosController extends Controller
{
    public function inserir(){

        $categorias = Categorias::select('id', 'nome')->get();
        $formas = FormaPagamentos::select('id', 'nome')->get();   
        // dd($categorias);

        return view('app.inserir', compact('categorias', 'formas'));

    }

    public function salvar(Request $request){
        
        $dados = $request->all();

        $dados['data_hora'] = "{$dados['data']} {$dados['hora']}";
        $dados['valor'] = str_replace(',', '.', $dados['valor']);
        Pagamentos::create($dados);

        return redirect(route('pagamentos.inserir'));
    }

    public function index(){

        $categorias = Categorias::select('id', 'nome')->get();
        $de = date('Y-m').'-01';
        $ate = date('Y-m-t');

        return view('pagamentos.index', compact('categorias', 'de', 'ate'));

    }

    public function filter(Request $request){

        $dados = $request->all();

        // dd($dados);

        $de = $dados['de'];
        $ate = $dados['ate'];
        $categoria_id = $dados['categoria_id'];

        $whereCategoria = [];

        if($categoria_id)
            $whereCategoria[] = ['categoria_id', $categoria_id];

        $categorias = Categorias::select('id', 'nome')->get();

        $pagamentos = Pagamentos::select(

            'pagamentos.*',
            'forma_pagamentos.nome AS formaPagamento',
            'categorias.nome AS Categoria'
        )
            ->join('forma_pagamentos', 'forma_pagamento_id', '=', 'forma_pagamentos.id')
            ->join('categorias', 'categoria_id', '=', 'categorias.id')
            ->where('data_hora', '>=', $dados['de'] . ' OO:OO:OO')
            ->where('data_hora', '<=', $dados['ate'] . ' 23:59:59')
            ->where($whereCategoria)
            ->orderBy('data_hora','ASC')->get();

        return view('pagamentos.index', compact('pagamentos', 'de', 'ate', 'categorias', 'categoria_id'));

    }

    public function exportar(){

        $meses = [
            '01' => 'Janeiro',
            '02' => 'Fevereiro',
            '03' => 'Março',
            '04' => 'Abril',
            '05' => 'Maio',
            '06' => 'Junho',
            '07' => 'Julho',
            '08' => 'Agosto',
            '09' => 'Setembro',
            '10' => 'Outubro',
            '11' => 'Novembro',
            '12' => 'Dezembro'
        ];

        $anos = [
            '2022',
            '2021',
            '2020',
            '2019'
        ];

        
        return view('pagamentos.exportar', compact('meses', 'anos'));

    }

    public function execExportar(Request $request){

        $dados = $request->all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        $sheet->setCellValueByColumnAndRow(1, 1, "Categoria");
        $sheet->setCellValueByColumnAndRow(2, 1, "Valor");
        $sheet->setCellValueByColumnAndRow(3, 1, "Forma de pagamento");
        $sheet->setCellValueByColumnAndRow(4, 1, "Data");
        $sheet->setCellValueByColumnAndRow(5, 1, "Hora");
        $sheet->setCellValueByColumnAndRow(6, 1, "Obs");

        $pagamentos = Pagamentos::select('pagamentos.valor', 
                                        'pagamentos.data_hora', 
                                        'pagamentos.categoria_id',
                                        'categorias.nome AS categoria', 
                                        'forma_pagamentos.nome AS forma_pagamento')
                                ->join('categorias','pagamentos.categoria_id', '=', 'categorias.id')
                                ->join('forma_pagamentos','pagamentos.forma_pagamento_id', '=', 'forma_pagamentos.id')
                                ->whereMonth('pagamentos.data_hora', $dados['mes'])
                                ->whereYear('pagamentos.data_hora', $dados['ano'])
                                ->orderBy('categorias.nome', 'ASC')
                                ->orderBy('pagamentos.data_hora', 'ASC')
                                ->get();


        $i = 2;

        $cat_ant = 1;
        $nome_ant = "";

        foreach ($pagamentos as $key => $pagamento) {

            // dd($pagamento->valor);
            //debug($payment->category->name);
            //echo $payment->category->name;
            if($cat_ant != $pagamento->categoria_id){
                $sheet->setCellValueByColumnAndRow(1, $i, "Total {$nome_ant}");
                $i++;
            }

            $sheet->setCellValueByColumnAndRow(1, $i, $pagamento->categoria);
            $sheet->setCellValueByColumnAndRow(2, $i, $pagamento->valor);
            $sheet->setCellValueByColumnAndRow(3, $i, $pagamento->forma_pagamento);
            $sheet->setCellValueByColumnAndRow(4, $i, date("d/m/Y", strtotime($pagamento->data_hora)));
            $sheet->setCellValueByColumnAndRow(5, $i, date("H:i", strtotime($pagamento->data_hora)));
            $sheet->setCellValueByColumnAndRow(6, $i, $pagamento->obs); 

            $cat_ant = $pagamento->categoria_id; 
            $nome_ant =  $pagamento->categoria;      

            $i++;
        }

        $sheet->setCellValueByColumnAndRow(1, $i, "Total {$nome_ant}");

        $writer = new Xlsx($spreadsheet);

        $file = "excel/".uniqid().".xlsx";
        $writer->save($file);  
        
        $headers = ['Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

        return response()->download($file, 'Export.xlsx', $headers);

    }

}
