<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
{
    public function index()
    {
        $especie = new Especie();
        $especies = Especie::All();
        return view(
            'especie.index',
            [
                'especie' => $especie,
                'especies' => $especies
            ]
        );
    }

    public function store(Request $request){
        if($request->get("id") != ""){
            $especie = Especie::Find($request->get("id"));
        }else{
            $especie = new Especie();
        }

        $especie->descricao = $request->get("descricao");
        $especie->save();
        $request->session()->flash("status", "salvo");

        return redirect('especie');
    }

    public function edit($id)
    {
        $especie = Especie::Find($id);
        $especies = Especie::All();
        return view(
            'especie.index',
            [
                'especie' => $especie,
                'especies' => $especies
            ]
        );
    }

    public function destroy($id, Request $request){
        Especie::Destroy($id);
        $request->session()->flash("status", "excluido");
        return redirect("/especie");
    }
}
