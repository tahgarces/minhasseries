<?php

namespace App\Http\Controllers;



use App\Serie;
use http\Env\Request;

class SeriesController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $nome = $request->nome;


        $serie = Serie::create($request->all());
        $request->session()
                ->flash(
                    'mensagem',
                    "Série {$serie->id} criada com sucesso {$serie->nome}"
                );
        return redirect()->route('listar_series');
    }
    public function destroy(\Illuminate\Http\Request $request){
        Serie::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Série removida com sucesso!"
            );
        return redirect()->route('listar_series');

    }
}
