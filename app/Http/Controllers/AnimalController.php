<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    public function index()
    {
        $animal = DB::table('animal as a')
            ->join('especie as e', 'a.especie_id', '=', 'e.id')
            ->select(
                'a.id',
                'a.nome',
                'a.nome_dono',
                'e.descricao',
                'a.nome_dono',
                'a.data_nascimento',
                'a.idade',
                'a.created_at AS data',
            )
            ->orderByDesc('a.created_at')
            ->get();

        return view(
            'animal.index',
            [
                'animal' => $animal
            ]
        );
    }

    public function create()
    {
        $animal = new Animal();
        $animais = Animal::All();

        return view('animal.index', [
            'animal' => $animal,
            'animais' => $animais,
        ]);
    }

    public function store(Request $request)
    {
        if ($request->get("id") != "") {
            $animal = Animal::Find($request->get("id"));
        } else {
            $animal = new Animal();
        }

        $animal->nome = $request->get("nome");
        $animal->nome_dono = $request->get("nome_dono");
        $animal->especie_id = $request->get('especie_id');
        $animal->raca = $request->get("raca");
        $animal->data_nascimento = $request->get("data_nascimento");
        $animal->idade = 20;
        $animal->especie_id = 1;
        $animal->save();
        $request->session()->flash("status", "salvo");

        return redirect('animal');
    }

    public function edit($id)
    {
        $animal = Animal::Find($id);
        $animais = Animal::All();
        return view(
            'animal.index',
            [
                'animal' => $animal,
                'animais' => $animais
            ]
        );
    }

    public function destroy($id, Request $request)
    {
        Animal::Destroy($id);
        $request->session()->flash("status", "excluido");
        return redirect("/animal");
    }
}
