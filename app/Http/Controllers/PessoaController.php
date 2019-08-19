<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;
use DB;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('index', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoas = Pessoa::all();
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        DB::beginTransaction();

            try {
                $pessoa = Pessoa::create($request->all());

                DB::commit();
                return back()->with('success', 'Usuario cadastrado com sucesso!');
            }catch(\Exception $e) {
                DB::rollback();  
                return back()->with('error','Erro no servidor');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        
        return view('form', compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try{
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->update($request->all());

        DB::commit();

        return redirect()->route('pessoa.index')->with('success', 'Usuário atualizado com sucesso');

        }catch(\Exception $e){
        DB::rollback();
        return back()->with('error','Erro no servidor'. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        //
    }
}
