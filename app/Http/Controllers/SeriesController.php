<?php

namespace App\Http\Controllers;



use App\Serie;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::all();


        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $nome = $request->nome;


        $serie = Serie::create([
            'nome' => $nome,
        ]);
        echo "Série com id: {$serie->id} criada. {$serie->nome}";
    }
}
